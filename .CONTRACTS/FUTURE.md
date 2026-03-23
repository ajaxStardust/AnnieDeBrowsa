# FUTURE.md

WRITTEN FOR: human maintainers + AI agents planning follow-up sessions
LAST REVIEWED: 2026-03-23
REVIEW TRIGGER: Update when roadmap priorities are completed, dropped, or reordered.

## Purpose

Track forward-looking work without polluting CONTRACT.md invariants.

CONTRACT.md is present-tense law.
FUTURE.md is planned intent.

## Near-Term Priorities

1. Template consolidation report (read-only first)
- Produce orphan map for public/doctype and public/content variants.
- Keep current canonical template chain intact.

2. CSS surface stabilization
- Keep nav/header look stable in tachyons-extended overrides.
- Remove only dead duplicate override blocks after explicit verification.

3. Unicode utility hardening
- Keep PHP route as canonical.
- Optionally split large unicode content areas into scoped content partials.

## Medium-Term Candidates

1. Scoped contract addenda
- Consider adding ASSETS.CONTRACT.md if asset invariants become dense.
- Consider adding UI.CONTRACT.md if UI-specific invariants outgrow root contract.

2. Characterization tests for model layer
- Add baseline behavior checks for P2u2/Newmethod output shapes before deep refactors.

3. Performance and UX checks
- Evaluate nav rendering performance on large directories.
- Document expected limits in QUICKSTART once measured.

## Deferred / Discussion Items

1. Flask integration experiments
- Keep [flasktest](flasktest) for architecture discussion and comparative experimentation.
- Decide later whether to formalize it as integrated subsystem or archive it.

2. Optional contracts container
- Discuss moving governance artifacts into ./.CONTRACTS while preserving discoverability.
- If adopted, keep root pointer stubs to avoid breaking onboarding flow.

## Operating Rule

When a future item is executed, update the narrowest owning artifact:

- Invariants changed -> CONTRACT.md
- Reading-order/ownership changed -> WHY.md
- Run steps/proven checks changed -> QUICKSTART.md
- Plan/prospective work changed -> FUTURE.md
