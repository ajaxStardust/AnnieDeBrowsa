<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Magic Explosion Text</title>

<style>
  body {
    margin: 0;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #1e9bff;
    font-family: system-ui, sans-serif;
    perspective: 1200px;
    overflow: hidden;
  }

  svg {
    overflow: visible;
  }

  .letter-group {
    transform-box: fill-box;
    transform-origin: center;
    will-change: transform;
  }

  .letter {
    fill: white;
    font-weight: 900;
  }

  .extrude {
    fill: rgba(0,0,0,0.25);
    will-change: transform;
  }

  /* Shockwave pulse */
  #shockwave {
    fill: none;
    stroke: rgba(255,255,255,0.5);
    stroke-width: 4;
    opacity: 0;
  }
</style>
</head>

<body>

<svg width="900" height="300" viewBox="0 0 900 300">
  <circle id="shockwave" cx="450" cy="150" r="20"></circle>
  <g id="letters"></g>
</svg>

<script>
const text = "THANK YOU!";
const group = document.getElementById("letters");
const shockwave = document.getElementById("shockwave");

const fontSize = 110;
const startX = 450;
const startY = 160;

const letters = [];

text.split("").forEach((char, i) => {
  const g = document.createElementNS("http://www.w3.org/2000/svg", "g");
  g.setAttribute("class", "letter-group");

  const extrude = document.createElementNS("http://www.w3.org/2000/svg", "text");
  extrude.textContent = char;
  extrude.setAttribute("class", "extrude");
  extrude.setAttribute("x", startX + (i - text.length/2) * 70 + 10);
  extrude.setAttribute("y", startY + 10);
  extrude.setAttribute("font-size", fontSize);

  const letter = document.createElementNS("http://www.w3.org/2000/svg", "text");
  letter.textContent = char;
  letter.setAttribute("class", "letter");
  letter.setAttribute("x", startX + (i - text.length/2) * 70);
  letter.setAttribute("y", startY);
  letter.setAttribute("font-size", fontSize);

  g.appendChild(extrude);
  g.appendChild(letter);
  group.appendChild(g);

  letters.push({
    g,
    extrude,
    x: 0,
    y: 0,
    z: 0,
    rotX: 0,
    rotY: 0,
    rotZ: 0,
    vx: (Math.random() - 0.5) * 80,
    vy: (Math.random() - 0.5) * 80 - 30,
    vz: (Math.random() - 0.5) * 200,
    vrx: (Math.random() - 0.5) * 40,
    vry: (Math.random() - 0.5) * 40,
    vrz: (Math.random() - 0.5) * 40,
    resting: false
  });
});

function explode() {
  // Shockwave animation
  shockwave.style.transition = "none";
  shockwave.style.opacity = 1;
  shockwave.style.r = 20;

  requestAnimationFrame(() => {
    shockwave.style.transition = "all 0.6s ease-out";
    shockwave.style.opacity = 0;
    shockwave.style.r = 600;
  });

  letters.forEach(l => {
    l.vx = (Math.random() - 0.5) * 120;
    l.vy = (Math.random() - 0.5) * 120 - 40;
    l.vz = (Math.random() - 0.5) * 300;

    l.vrx = (Math.random() - 0.5) * 60;
    l.vry = (Math.random() - 0.5) * 60;
    l.vrz = (Math.random() - 0.5) * 60;

    l.resting = false;
  });
}

function animate() {
  letters.forEach(l => {
    if (!l.resting) {
      // Apply velocity
      l.x += l.vx;
      l.y += l.vy;
      l.z += l.vz;

      l.rotX += l.vrx;
      l.rotY += l.vry;
      l.rotZ += l.vrz;

      // Gravity
      l.vy += 2;

      // Drag
      l.vx *= 0.94;
      l.vy *= 0.94;
      l.vz *= 0.94;

      l.vrx *= 0.9;
      l.vry *= 0.9;
      l.vrz *= 0.9;

      // Spring return
      l.x *= 0.88;
      l.y *= 0.88;
      l.z *= 0.88;

      l.rotX *= 0.88;
      l.rotY *= 0.88;
      l.rotZ *= 0.88;

      // Stop when close
      if (Math.abs(l.x) < 0.5 && Math.abs(l.y) < 0.5 && Math.abs(l.z) < 0.5) {
        l.x = l.y = l.z = 0;
        l.rotX = l.rotY = l.rotZ = 0;
        l.resting = true;
      }

      // Extrusion stretch based on Z-depth
      const stretch = Math.max(0, l.z * 0.05);
      l.extrude.style.transform = `translate(${stretch}px, ${stretch}px)`;

      // Apply 3D transform
      l.g.style.transform =
        `translate3d(${l.x}px, ${l.y}px, ${l.z}px)
         rotateX(${l.rotX}deg)
         rotateY(${l.rotY}deg)
         rotateZ(${l.rotZ}deg)`;
    }
  });

  requestAnimationFrame(animate);
}

explode();
animate();

document.body.addEventListener("click", explode);
</script>

</body>
</html>
