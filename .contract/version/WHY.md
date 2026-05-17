# WHY.md

WRITTEN FOR: human onboarding + AI agent onboarding
LAST REVIEWED: 2026-03-29
REVIEW TRIGGER: Update when artifact ownership boundaries, steward scope, required reading order, or this “what each file is for” cheat sheet changes.

## Purpose

This file ties CONTRACT.md, QUICKSTART.md, and FUTURE.md together so the next editor (human or agent) knows where to update truth.

## What each file is for (quick memory)

| File | Role in one sentence |
|------|----------------------|
| [CONTRACT.md](CONTRACT.md) | **What must not break**—routes, model contracts, and a few hard rules worth firing a trigger when they change. |
| [WHY.md](WHY.md) | **Why the docs are split** and how to pick the *narrowest* file to edit; steward scope and session-close habit. |
| [QUICKSTART.md](QUICKSTART.md) | **How to run and check**—URLs, key file paths, manual “proven checks,” including *operational* references to smaller UX bits. |
| [FUTURE.md](FUTURE.md) | **Ideas and backlog**—not law until someone promotes them through the narrowest-scope rule. |

**Core vs peripheral:** the *product* heart is the path-to-URL app ([public/default.php](public/default.php)), its model layer, and the config-backed off-site links behavior. The **file-browser shell** (`/public/index.php`)—letter nav, iframe, and the **`#pageControls`** “page tools” flyout—is **supporting UX**: handy, but not mission-critical. Details for `#pageControls` stay in [QUICKSTART.md](QUICKSTART.md) (key-files row + optional proven check), not as a full invariant in [CONTRACT.md](CONTRACT.md), unless you later decide it is.

## Core Relationship

1. [CONTRACT.md](CONTRACT.md) owns invariants and boundaries.
2. [QUICKSTART.md](QUICKSTART.md) owns run instructions, proven checks, and the practical file map.
3. [FUTURE.md](FUTURE.md) owns roadmap and deferred intent (non-binding until promoted).
4. This file owns the relationship and reading order between those artifacts.

## Reading Order Is Scope

Use this order at session start:

1. [CONTRACT.md](CONTRACT.md)
2. [WHY.md](WHY.md)
3. [QUICKSTART.md](QUICKSTART.md)
4. [FUTURE.md](FUTURE.md) — after core sync; queued direction only, not present-tense law.
5. Then target files.

Reason:

- First establish what cannot break.
- Then establish why documentation is split.
- Then establish how to run and verify current behavior.
- Then skim planned intent without treating it as binding until promoted.

## Narrowest-Scope Update Rule

When something changes, update the narrowest artifact that fully contains the change.

- Invariants or route/boundary contracts -> CONTRACT.md
- Run commands, key-file table, verification checks -> QUICKSTART.md
- Relationship between docs, ownership policy, reading order -> WHY.md
- Roadmap / deferred ideas only -> FUTURE.md

If uncertain, ask a clarifying question instead of guessing.

## Ownership Policy

Within an active user session, the coding agent acts as **governance steward**: authorized and expected to update the owning artifact when scope-affecting changes occur.

**Acceptance (2026-03-29):** the steward **accepts** the role and scope below when the owner instructs “accept governance role” for `./.contract`.

**Steward authority scope (owner-granted):** full edit authority applies **only** to `./.contract/**/*.md` unless the owner explicitly expands scope for a given task. Do not infer permission to change application code from steward role alone.

**Session close:** if the session included scope-affecting behavior or structure changes, the steward brings `./.contract/` back in sync (narrowest-scope updates, `LAST REVIEWED` where touched, Governance Update Log when history should record the change) before wrapping up.

No scope-affecting change should be merged mentally without a matching artifact update.

## Drift Warning

A stale contract is worse than no contract because it creates false confidence.

Keep LAST REVIEWED and REVIEW TRIGGER fields current in all **four** core artifact files (CONTRACT, WHY, QUICKSTART, FUTURE).

`LAST REVIEWED` must match a **real calendar date** when those files were actually revised (use the owner’s or steward’s known “today”), not invented future days from batch edits.
