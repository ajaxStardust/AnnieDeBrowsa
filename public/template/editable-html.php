<h1> <?= $page_heading ?> </h1>
<section class="mw8 center pa3 pa4-ns">
  <h2 class="f3 f2-ns fw7 navy mb3">Tachyons Demo Blocks</h2>

  <!-- Simple content card -->
  <article class="bg-white br3 ba b--black-10 shadow-2 pa3 pa4-ns mb4">
    <h3 class="f4 fw6 mt0 mb2 dark-gray">Simple Card</h3>
    <p class="lh-copy gray mb0">
      This is a clean utility-first card using Tachyons spacing, border, and typography classes.
    </p>
  </article>

  <!-- Media / image / text card -->
  <article class="bg-near-white br3 ba b--black-10 overflow-hidden shadow-3">
    <div class="flex flex-column flex-row-ns">
      <div class="w-100 w-40-ns">
        <img
          src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=900&q=80"
          alt="Tech desk with keyboard and monitor"
          class="db w-100 h-100 object-cover"
        >
      </div>

      <div class="w-100 w-60-ns pa3 pa4-ns">
        <p class="ttu tracked f7 mid-gray mb2">Media Card</p>
        <h3 class="f4 fw7 mt0 mb3 dark-gray">Image + Text Layout</h3>
        <p class="lh-copy gray mb3">
          On mobile this stacks vertically. On larger screens, it becomes a side-by-side media card.
        </p>

        <div class="flex items-center justify-between">
          <a href="#" class="link dim br2 ph3 pv2 bg-blue white fw6">Action</a>
          <span class="f7 mid-gray">Updated just now</span>
        </div>
      </div>
    </div>
  </article>
</section>