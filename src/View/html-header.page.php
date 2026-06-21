<?php
namespace Adb\View;
error_reporting(E_ALL);
?>

<body id="index" class="bg-light-corn-animated">

<style>
  /* ── ADB Tool B header ── */
  #adb-header {
    background: linear-gradient(155deg, #0b1228 0%, #0d1733 56%, #0b1530 100%);
    border-bottom: 3px solid #6366f1;
    display: grid;
    grid-template-columns: minmax(18rem, 2.3fr) auto minmax(20rem, 1.25fr);
    align-items: center;
    justify-content: stretch;
    padding: 0.7rem 1.5rem;
    gap: 1.25rem;
    max-height: 6.5rem;
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.03), 0 0.75rem 1.4rem rgba(2, 6, 23, 0.24);
  }
  #adb-header object#svg-header-title {
    height: 104px;
    width: 100%;
    min-width: 0;
    max-width: none;
    display: block;
  }
  #adb-header .adb-term-icon {
    width: 56px;
    height: 56px;
    opacity: 0.9;
    justify-self: center;
    filter: drop-shadow(0 0.25rem 0.5rem rgba(2, 6, 23, 0.3));
  }
  #adb-header .adb-term-icon rect {
    fill: #17253f;
  }
  #adb-header .adb-github-wrap {
    width: clamp(18rem, 30vw, 26rem);
    min-width: 18rem;
    max-width: 26rem;
    justify-self: end;
    margin-left: 0;
  }
  #adb-header #adb-card-github {
    background: linear-gradient(165deg, rgba(30, 41, 59, 0.88), rgba(23, 33, 49, 0.92));
    border: 1px solid rgba(99, 102, 241, 0.28);
    border-radius: 0.5rem;
    color: #e2e8f0;
    padding: 0.4rem 0.75rem;
    margin: 0;
    width: 100%;
    max-width: none;
    box-sizing: border-box;
    font-size: 0.8rem;
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.05), 0 0.35rem 0.8rem rgba(2, 6, 23, 0.2);
  }
  #adb-header #adb-card-github summary {
    display: flex;
    align-items: center;
    gap: 0.4rem;
    cursor: pointer;
    font-weight: 600;
    color: #e2e8f0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    list-style: none;
    transition: color 0.16s ease, text-shadow 0.16s ease;
  }
  #adb-header #adb-card-github summary:hover {
    color: #f8fafc;
    text-shadow: 0 0 0.4rem rgba(129, 140, 248, 0.38);
  }
  #adb-header #adb-card-github summary img {
    width: 18px;
    height: 18px;
    flex-shrink: 0;
  }
  #adb-header #adb-card-github .expanded-content {
    color: #94a3b8;
    font-size: 0.72rem;
    margin-top: 0.4rem;
  }
  #adb-header #adb-card-github .text-gray-700,
  #adb-header #adb-card-github small,
  #adb-header #adb-card-github p,
  #adb-header #adb-card-github cite {
    color: #cbd5e1 !important;
  }
  #adb-header #adb-card-github a { color: #818cf8; }
  #adb-header #adb-card-github a:hover { color: #a5b4fc; }
  @media (max-width: 860px) {
    #adb-header {
      grid-template-columns: 1fr;
      justify-items: stretch;
      gap: 0.8rem;
    }
    #adb-header .adb-term-icon {
      justify-self: start;
      width: 48px;
      height: 48px;
    }
    #adb-header .adb-github-wrap {
      width: 100%;
      min-width: 0;
      max-width: none;
      justify-self: stretch;
    }
    #adb-header object#svg-header-title {
      width: 100%;
      height: 88px;
    }
  }
</style>

<header id="adb-header">

    <!-- Masthead SVG -->
    <object id="svg-header-title"
            data="assets/css/masthead.php"
            type="image/svg+xml">
    </object>

    <!-- >_ terminal icon -->
    <svg class="adb-term-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" aria-hidden="true">
        <rect width="64" height="64" rx="8" fill="#1e293b"/>
        <text x="8" y="44" font-family="monospace" font-size="28" fill="#6366f1">&gt;_</text>
    </svg>

    <!-- SPA card -->
    <div class="adb-github-wrap">
        <?php include 'content/card-github.partial.php'; ?>
    </div>

</header>

    <!-- ^ id=pagewidth -->

  <div id="pagewidth" class="min-h-screen">
    <div id="wrapper">
