<h1>Using Ollama for AI on Localhost</h1>
<p>
<strong>Note:</strong>
You will experience a long delay when you first run a local model because it
must load into RAM memory. Whether a Model will run on your system is
proportional to the amount of RAM in your device. E.g. to run a model ~20 GB,
you'll need 32 GB of RAM. The larger the model, the longer the wait.
</p>
<p>
If the LLM model selected is an llm-model-name:
<strong>cloud</strong>
(cloud-based model), you will not experience delay. Cloud models have usage
limits for Subscribed, FREE plan users: a paid subscription is recommended,
but not required.
</p>
<section class="blockquote">
<details id="clouduse">
<summary class="h3">Understand the Core Dynamic in Cloud Usage</summary>
<p>
Each message includes the
<strong>full conversation history</strong>
. So as we go:
</p>
<pre class="code">
Turn 1:  [you msg]         → tokens for just turn 1
Turn 2:  [turn 1 + you msg] → larger than turn 1
Turn 3:  [turn 1 + 2 + you]   → even bigger
</pre
>
<p>
Every new message re-sends everything you've said so far as context for
the model to reason over. That's why a 20-message conversation costs way
more than 20 separate 1-message conversations.
</p>
<p>
On the Ollama side, what you're seeing is probably a running meter that
tallies up all the input+output tokens from your API calls. It counts both
directions — what you send and what comes back.
</p>
<p>
<strong>Why it accelerates</strong>
: Longer conversations → more context → more tokens per message → meter
climbs
<strong>faster as you go</strong>
.
</p>
<p>
Caching: Ollama may cache shared context to reduce repeat transmission,
but it's model/usage pattern dependent — not guaranteed.
</p>
<p>
Output length matters too — a short question from you + a long detailed
answer from me = significant output tokens on my side of the meter.
</p>
<blockquote>
no kidding! it sends the complete history every time!? Does that mean it's
bettter to continue to open a new session per question or request?
<cite>~ @ajaxStardust</cite>
</blockquote>
<p>It's situational — depends on what you're doing:</p>
<p><strong>Start a new session when:</strong></p>
<ul>
<li>You're done with a topic and moving to something unrelated</li>
<li>The prior context has no value for the new task</li>
<li>You'd spend more tokens re-explaining everything than you'd save</li>
</ul>
<p><strong>Keep the session when:</strong></p>
<ul>
<li>You're building on something (debugging code, iterative work)</li>
<li>The prior context is genuinely useful to carry forward</li>
<li>
Re-establishing background would cost as much or more than continuing
</li>
<p>
The math: Say you have a 50-message conversation. Starting fresh saves
~49 messages of context... but if you need to re-explain 20 messages
worth of background to get back up to speed, you've spent half your
savings just getting there.
</p>
<p>
Best practice: It's not about fresh vs. continuing — it's about when to
reset. For Ollama specifically, if you're done with a task, close it out
and start fresh for the next one. But don't churn sessions mid-task just
to save tokens.
</p>
<p>
Think of it like a document: you don't close a document every few
paragraphs to "save memory." You close it when you're done with the
chapter.
</p>
<p>
<code>
connected | idle agent main | session main (openclaw-tui) |
ollama/minimax-m2.7:cloud | tokens 13k/197k (6%)
</code>
</p>
<cite>
~ minimax-m2.7:
<strong>cloud</strong>
via Open
<strong>Claw</strong>
on localhost
</cite>
</ul>
</details>
</section>
<p>
<button
aria-haspopup="dialog"
id="sc-launch-btn"
class="sc-launch-btn"
type="button"
>
<svg
aria-hidden="true"
stroke-linejoin="round"
stroke-linecap="round"
stroke-width="2"
stroke="currentColor"
fill="none"
viewBox="0 0 24 24"
height="16"
width="16"
>
<rect rx="2" height="14" width="20" y="3" x="2"></rect>
<path d="M8 21h8M12 17v4"></path>
</svg>
Open AI Spending Tracker
</button>
</p>
<div aria-hidden="true" hidden="" id="sc-modal" class="sc-modal">
<div id="sc-backdrop" class="sc-modal__backdrop"></div>
<div
aria-labelledby="sc-modal-title"
aria-modal="true"
role="dialog"
class="sc-modal__dialog"
>
<div class="sc-modal__header">
<h3 id="sc-modal-title" class="sc-modal__title">AI Spending Tracker</h3>
<button
aria-label="Close spending tracker"
id="sc-modal-close"
class="sc-modal__close"
type="button"
>
×
</button>
</div>
<p class="sc-modal__intro">
Edit
<strong>Units</strong>
to model your usage. Toggle
<strong>Auto-renew</strong>
and set an extra budget to see what happens when you exceed your included
allowance.
</p>

<div class="sc-table-wrap">
<table class="sc-table">
<thead>
<tr>
<th>Tool</th>
<th>Category</th>
<th>Billing</th>
<th class="sc-th--units">Units / Mo</th>
<th>Included</th>
<th>On-Demand</th>
<th>Auto-renew</th>
<th>Monthly Cost</th>
</tr>
</thead>
<tbody id="sc-tbody"></tbody>
</table>
</div>

<div class="sc-summary">
<div class="sc-summary__item">
<span class="sc-summary__label">Base Monthly</span>
<span id="sc-base" class="sc-summary__value">$0.00</span>
</div>
<div class="sc-summary__item">
<span class="sc-summary__label">On-Demand Extra</span>
<span id="sc-extra" class="sc-summary__value sc-summary__value--extra">
$0.00
</span>
</div>
<div class="sc-summary__item sc-summary__item--total">
<span class="sc-summary__label">Monthly Total</span>
<span id="sc-monthly" class="sc-summary__value">$0.00</span>
</div>
<div class="sc-summary__item">
<span class="sc-summary__label">Daily Burn</span>
<span id="sc-daily" class="sc-summary__value">$0.00</span>
</div>
<div class="sc-summary__item">
<span class="sc-summary__label">Annual Spend</span>
<span id="sc-annual" class="sc-summary__value">$0.00</span>
</div>
</div>

<p class="sc-footnote">
<strong>On-demand</strong>
means the tool lets you pay extra beyond your included allowance rather
than cutting you off.
<strong>Auto-renew</strong>
automatically charges that extra budget when you hit your limit — set it
to $0 to model the hard-stop scenario.
</p>
</div>
</div>

<p></p>
<h2>Prerequisites</h2>
<div class="required">
Required
<span class="required-yes">Yes</span>
</div>
<p>Install Nodejs and npm (via your package manager)</p>
<h3>Install NVM for OpenCLAW:</h3>
<div class="required">
Required
<span class="required-no">No</span>
</div>
<p>
You'll need
<strong>nvm</strong>
to change
<strong>Node.js</strong>
version to 22 or newer.
</p>
<pre><code class="language-bash">curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.4/install.sh | bash
# or
wget -qO- https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.4/install.sh | bash
</code></pre>
<p>
<code>nvm install 24</code>
<code>nvm use 24</code>
</p>
<h1>Ollama Primary Installer</h1>
<h2>Ollama</h2>
<div class="required">
Required
<span class="required-no">Yes</span>
</div>
<pre><code class="language-bash">curl -fsSL https://ollama.com/install.sh | sh
</code></pre>
<p>
After installation:
<kbd>ollama launch</kbd>
</p>
<h2>Supplemental to Ollama</h2>
<h3>Claude (Skils Tooling)</h3>
<div class="required">
Required
<span class="required-no">No</span>
</div>
<pre><code class="language-bash">curl -fsSL https://claude.ai/install.sh | bash
</code></pre>
<h3>Install OpenCode (Skils Tooling)</h3>
<div class="required">
Required
<span class="required-no">No</span>
</div>
<pre><code class="language-bash">curl -fsSL https://opencode.ai/install | bash
</code></pre>
<h3>Install Cline CLI (Skils Tooling)</h3>
<div class="required">
Required
<span class="required-no">No</span>
</div>
<pre><code class="language-bash">npm install -g cline
</code></pre>
<p>
LLM
<strong><a href="https://ollama.com/search">Models Available</a></strong>
for Ollama
  </p>
  <h2>Start an LLM on Localhost with Ollama</h2>
  <div class="required">
  Required
  <span class="required-no">Yes</span>
  </div>
  <p>
  <code>ollama launch openclaw --model minimax-m2.7:cloud</code>
  <br />
  <strong><code>ollama run qwen:latest</code></strong>
  (1)
  <br />
  <code>ollama launch claude --model gemma4:latest</code>
  <br />
  <code>ollama launch opencode --model gpt-oss</code>
  </p>
  <h1>Terminology: LLM Tool</h1>
  <div class="required">
  Required
  <span class="required-no">No</span>
  </div>
  <h2>Skills Tooling with Ollama</h2>
  <p>
  Use Ollama CLI with
  <strong>Tooling</strong>
  on Localhost. Apps like openclaw allow you to do a lot more, such as edit
  files on your filesystem, organize folders, and all sorts of fantastic things.
  </p>
  <p>
  Senior engineers commonly use more specific terms rather than the generic "LLM
  tool." From industry docs and project sites (OpenClaw, OpenCode, blogs), the
  top preferred labels are:
  </p>
  <ul>
  <li>
  <strong>Agent framework</strong>
  or "agentic framework" — for systems that orchestrate multi-step/autonomous
  workflows, maintain memory, schedule tasks, and manage skills/plugins.
  (OpenClaw uses this language and "skills".)
  </li>
  <li>
  <strong>Coding assistant</strong>
  or "AI coding assistant" — for tools that augment developer workflows
  interactively (refactoring, multi-file edits, LSP integration).
  </li>
  <li>
  Code-execution runtime or
  <strong>LLM code-execution framework</strong>
  — for projects exposing safe runtimes to run model-generated code.
  </li>
  <li>
  "Integration/adapter library" or
  <strong>tooling for LLMs</strong>
  — when the project mainly provides connectors to external services (APIs,
                                                                      DBs, CLIs).
  </li>
  <li>
  "Developer platform" or
  <strong>toolchain</strong>
  — when the product bundles orchestration, observability, and developer UX.
  </li>
  </ul>
  <img
  alt="PlantUML Diagram of LLM Toolchain"
  src="https://dufospy.com/storage/photos/1/plantuml-llm-framework-toolling.png"
  />
  <h3>Practical guidance:</h3>
  <ul>
  <li>
  Call OpenClaw an "agent framework" (itself uses terms like "agents",
                                      "skills", "orchestration").
  </li>
  <li>
  Call OpenCode a "coding assistant" or "LLM code-execution framework" if its
  core is multi-file edits, LSP integration, and running code from models;
  call it an "LLM developer toolchain" if it bundles validation and
  observability.
  </li>
  </ul>
  <p>
  <strong>(1)</strong>
  Not all Models support tooling. Those that don't support tooling can be
  launched with
  <code>run</code>
  , without a UI like
  <em>OpenClaw</em>
  </p>
  <h1>Recommended Local Models</h1>
  <div class="see-also">
  <p>
  See Also |
  <a href="https://dufospy.com/glossary/llm-quantization-levels">
  LLM Quantization Levels
  </a>
  </p>
  <p>
  E.g.
  <code>Q3_K_L, Q4_K_M, Q6_K, Q8_0</code>
  </p>
  <div class="required">
  Required
  <span class="required-no">No</span>
  </div>
  </div>
  <p>
  Starting an LLM takes time. The smaller the model, the faster the startup.
  </p>
  <img
  title="Startup Time demo"
  alt="Startup Time Example"
  src="https://dufospy.com/storage/photos/1/Screenshot_20260418_083311.png"
  />
  <p>
  Try them by size, starting with smallest first. The stars are a rough guess as
  remembered.
  </p>
  <h2>Tooling-Supported Models Used Successfully</h2>
  <img
  alt="Ollama Models in Spreadsheet"
  src="https://dufospy.com/storage/photos/shares/ollama-model-spreadsheet.png"
  />
  <h3>Why Tooling?</h3>
  <p>
  As mentioned elsewhere in this article,
<em>tooling</em>
or the
<em>toolchain</em>
or whatever someone decides is the right terminology for the context, tooling
is the requirement that enables the model to edit files in an editor like
Kiro, VS Code, Zed, and Cursor, etc.
</p>
<p>
<a title="Details about Cloud Use" href="#clouduse">Cloud</a>
Models:
</p>
<section id="model-details" class="blockquote">
<details>
<summary>Nemotron (NVIDIA)</summary>
<kbd>ollama launch claude --model nemotron-3-super:cloud</kbd>
<p>
NVIDIA Nemotron 3 Ultra is a 550 billion parameter (55B active) open model
from NVIDIA built for long-running, agentic workflows with fast and
affordable performance across hundreds of tool calls.
</p>
<h3>Model highlights</h3>
<ul>
<li>
<strong>Built for long-running agents:</strong>
Tuned for agent orchestration, coding agents, deep research, and complex
enterprise workflows that run across hundreds of steps.
</li>
<li>
<strong>1M token context:</strong>
Keep entire codebases, long tool histories, and research trails in
context without losing the thread.
</li>
<li>
<strong>Frontier reasoning, high efficiency:</strong>
550B total parameters with only 55B active per token, and optimized for
NVFP4, NVIDIA’s 4-bit floating point format that packs the model into
less memory and runs faster.
</li>
</ul>
<h3>Benchmarks</h3>
<p>
Nemotron 3 Ultra leads on accuracy across agent productivity, instruction
following, and long-context tasks, while delivering leading
throughput—saving up to 30% on costs compared to other leading open
models.
</p>
<p>
<img
class="fr-fil fr-dib"
src="https://files.ollama.com/nemotron-3-ultra-agentic-benchmarks.png"
alt="Table showing Nemotron 3 Ultra leading among open models on agentic benchmarks for agent productivity, coding, and instruction following."
/>
<em>
&nbsp;Figure 1: Nemotron 3 Ultra leads among open models on agentic
benchmarks for agent productivity, coding, and instruction
following.&nbsp;
</em>
</p>
<h3>Reference</h3>
<ul>
<li>
<a
rel="nofollow"
href="https://developer.nvidia.com/blog/nvidia-nemotron-3-ultra-powers-faster-more-efficient-reasoning-for-long-running-agents/"
>
&nbsp;NVIDIA Nemotron 3 Ultra blog&nbsp;
</a>
</li>
</ul>
</details>
<details>
<summary>Qwen</summary>
<p>
<img
class="fr-fil fr-dib"
src="/assets/library/qwen3.6/a4dafb1d-29c1-46bc-81ca-a8a6db6b55b3"
width="360"
/>
</p>
<p>
Following the February release of the Qwen3.5 series, we’re pleased to
share the first open-weight variant of Qwen3.6. Built on direct feedback
from the community, Qwen3.6 prioritizes stability and real-world utility,
offering developers a more intuitive, responsive, and genuinely productive
coding experience.
</p>
<h3>Qwen3.6 Highlights</h3>
<p>This release delivers substantial upgrades, particularly in</p>
<ul>
<li>
<p>
Agentic Coding: the model now handles frontend workflows and
repository-level reasoning with greater fluency and precision.
</p>
</li>
<li>
<p>
Thinking Preservation: we’ve introduced a new option to retain
reasoning context from historical messages, streamlining iterative
development and reducing overhead.
</p>
</li>
</ul>
<p>
qwen3.5:cloud - (untested) . jcyhsiao/qwen3.5cloud:latest - 0.0 GB (Cloud
+ Vision) - ⚡ [ agent claimed vision not supported ]
<a id="anchor_quen" href="https://www.qwencloud.com/models">Qwen</a>
by
<a href="https://modelstudio.alibabacloud.com/ id=">Alibaba</a>
. Qwen Studio offers comprehensive functionality spanning chatbot, image
and video understanding, image generation, document processing, web search
integration, tool utilization, and artifacts.
</p>
</details>
<details>
<summary>minimax</summary>
<blockquote>
<p>
Ollama’s Cloud is officially licensed with MiniMax for commercial usage
</p>
<p>
In partnership with MiniMax, the M3 model on Ollama’s Cloud is US-based
with zero data retention.
</p>
</blockquote>
<h3>Highlights</h3>
<ul>
<li>
<p>
MiniMax M3 achieves top-tier performance on coding and agentic
benchmarks, with autonomous task decomposition, tool invocation, and
multi-step reasoning capabilities — providing a reliable foundation
for AI coding assistants and automated workflows.
  </p>
  </li>
  <li>
  <p>
  Powered by the proprietary MiniMax Sparse Attention (MSA)
  architecture, M3 supports up to 1M tokens context window with a
  guaranteed minimum of 512K tokens. The 1M context is the
  infrastructure for long-range Agent tasks, long-range Coding, and
  long-video understanding.
  </p>
  </li>
  <li>
  <p>
  A natively multimodal model. The entire data pipeline was rebuilt to
  scale pretraining data to 100T+, with multimodal training from step
  zero achieving deep alignment between textual and visual semantic
  spaces. Multimodal is a native core capability, not a superficial
  add-on.
  </p>
  </li>
  <li>
  <p>
  On BrowseComp, M3 scores 83.5, surpassing Opus 4.7 (79.3),
  demonstrating strong autonomous browsing and information retrieval
  capabilities.
  </p>
  </li>
  <li>
  <p>
  Until now, only a handful of closed-source models could simultaneously
  achieve frontier coding capabilities, million-token context, and
  Multimodal. M3 is the first to bring complete frontier capability to
  the open world.
  </p>
  </li>
  </ul>
  <h3>Benchmark</h3>
  <p>
  <img
  class="fr-fil fr-dib"
  src="https://ollama.com/assets/library/minimax-m3/3d512ace-b6bf-4e00-8bc0-cbe9ff79627b"
  alt="Benchmark"
  />
  </p>
  <h3>Architecture</h3>
  <p>MiniMax Sparse Attention (MSA) Architecture</p>
  <p>
  <img
  class="fr-fil fr-dib"
  src="https://ollama.com/assets/library/minimax-m3/de272c65-0490-4e05-93e4-4150d5763817"
  alt="image.png"
  />
  </p>
  <p>
  The MSA architecture enables native ultra-long context pretraining. M3
  supports up to 1M tokens context window with a guaranteed minimum of 512K
  tokens, delivering excellent inference latency and throughput at extreme
  context lengths. The 1M context is the infrastructure for long-range Agent
  tasks, long-range Coding, and long-video understanding.
  </p>
  <p>
  <img
  class="fr-fil fr-dib"
  src="https://ollama.com/assets/library/minimax-m3/a998096b-a024-4971-be2b-5aeae3cacbe1"
  alt="Full benchmarks"
  />
  </p>
  <ul>
  <li>minimax-m2.7:cloud - 0.0 GB (Cloud) - ⚡⚡⚡⚡</li>
  <li>ollama launch hermes --model minimax-m3:cloud</li>
  </ul>
  </details>
  <details>
  <summary>Gemma</summary>
  <p>
  <img
  class="fr-fil fr-dib"
  src="/assets/library/gemma4/d698dd59-9f30-44f9-81b1-a7620010c005"
  alt="Gemma 4 Ollama logo"
  />
  &nbsp;Gemma is a family of open models built by Google DeepMind. Gemma 4
  models are multimodal, handling text and image input and generating text
  output.
  </p>
  <p>
  Gemma 4 introduces key
  <strong>capability and architectural advancements</strong>
  :
  </p>
  <ul>
  <li>
  <p>
  <strong>Reasoning</strong>
  – All models in the family are designed as highly capable reasoners,
with configurable thinking modes.
</p>
</li>
<li>
<p>
<strong>Extended Multimodalities</strong>
– Processes Text, Image with variable aspect ratio and resolution
support (all models)
</p>
</li>
<li>
<p>
<strong>Diverse &amp; Efficient Architectures</strong>
– Offers Dense and Mixture-of-Experts (MoE) variants of different
sizes for scalable deployment.
</p>
</li>
<li>
<p>
<strong>Optimized for On-Device</strong>
– Smaller models are specifically designed for efficient local
execution on laptops and mobile devices.
</p>
</li>
<li>
<p>
<strong>Increased Context Window</strong>
– The small models feature a 128K context window, while the medium
models support 256K.
</p>
</li>
<li>
<p>
<strong>Enhanced Coding &amp; Agentic Capabilities</strong>
– Achieves notable improvements in coding benchmarks alongside native
function-calling support, powering highly capable autonomous agents.
</p>
</li>
<li>
<p>
<strong>Native System Prompt Support</strong>
– Gemma 4 introduces native support for the
<code>system</code>
role, enabling more structured and controllable conversations.
</p>
</li>
</ul>
<h3>Models</h3>
<p><strong>Ollama’s cloud</strong></p>
<pre><code>ollama run gemma4:31b-cloud
</code></pre>
<p><strong>Edge models</strong></p>
<p>
The “E” in E2B and E4B stands for “effective” parameters, and are made for
edge device deployments.
</p>
<p><strong>Effective 2B (E2B)</strong></p>
<pre><code>ollama run gemma4:e2b
</code></pre>
<p><strong>Effective 4B (E4B)</strong></p>
<pre><code>ollama run gemma4:e4b
</code></pre>
<p><strong>Workstation models</strong></p>
<p>These models are designed for frontier intelligence locally.</p>
<p><strong>12B</strong></p>
<pre><code>ollama run gemma4:12b
</code></pre>
<p>
<strong>26B</strong>
(Mixture of Experts model with 4B active parameters)
</p>
<pre><code>ollama run gemma4:26b
</code></pre>
<p>
<strong>31B</strong>
(Dense)
</p>
<pre><code>ollama run gemma4:31b
</code></pre>
<h2>Benchmark Results</h2>
<p>
These models were evaluated against a large collection of different
datasets and metrics to cover different aspects of text generation.
Evaluation results marked in the table are for instruction-tuned models.
</p>
<table>
<thead>
<tr>
<th align="left">
<br />
</th>
<th align="left">Gemma 4 31B</th>
<th align="left">Gemma 4 26B A4B</th>
<th align="left">Gemma 4 E4B</th>
<th align="left">Gemma 4 E2B</th>
<th align="left">Gemma 3 27B (no think)</th>
</tr>
</thead>
<tbody>
<tr>
<td align="left">MMLU Pro</td>
<td align="left">85.2%</td>
<td align="left">82.6%</td>
<td align="left">69.4%</td>
<td align="left">60.0%</td>
<td align="left">67.6%</td>
</tr>
<tr>
<td align="left">AIME 2026 no tools</td>
<td align="left">89.2%</td>
<td align="left">88.3%</td>
<td align="left">42.5%</td>
<td align="left">37.5%</td>
<td align="left">20.8%</td>
</tr>
<tr>
<td align="left">LiveCodeBench v6</td>
<td align="left">80.0%</td>
<td align="left">77.1%</td>
<td align="left">52.0%</td>
<td align="left">44.0%</td>
<td align="left">29.1%</td>
</tr>
<tr>
<td align="left">Codeforces ELO</td>
<td align="left">2150</td>
<td align="left">1718</td>
<td align="left">940</td>
<td align="left">633</td>
<td align="left">110</td>
</tr>
<tr>
<td align="left">GPQA Diamond</td>
<td align="left">84.3%</td>
<td align="left">82.3%</td>
<td align="left">58.6%</td>
<td align="left">43.4%</td>
<td align="left">42.4%</td>
</tr>
<tr>
<td align="left">Tau2 (average over 3)</td>
<td align="left">76.9%</td>
<td align="left">68.2%</td>
<td align="left">42.2%</td>
<td align="left">24.5%</td>
<td align="left">16.2%</td>
</tr>
<tr>
<td align="left">HLE no tools</td>
<td align="left">19.5%</td>
<td align="left">8.7%</td>
<td align="left">-</td>
<td align="left">-</td>
<td align="left">-</td>
</tr>
<tr>
<td align="left">HLE with search</td>
<td align="left">26.5%</td>
<td align="left">17.2%</td>
<td align="left">-</td>
<td align="left">-</td>
<td align="left">-</td>
</tr>
<tr>
<td align="left">BigBench Extra Hard</td>
<td align="left">74.4%</td>
<td align="left">64.8%</td>
<td align="left">33.1%</td>
<td align="left">21.9%</td>
<td align="left">19.3%</td>
</tr>
<tr>
<td align="left">MMMLU</td>
<td align="left">88.4%</td>
<td align="left">86.3%</td>
<td align="left">76.6%</td>
<td align="left">67.4%</td>
<td align="left">70.7%</td>
</tr>
<tr>
<td align="left"><strong>Vision</strong></td>
<td align="left">
<br />
</td>
<td align="left">
<br />
</td>
<td align="left">
<br />
</td>
<td align="left">
<br />
</td>
<td align="left">
<br />
</td>
</tr>
<tr>
<td align="left">MMMU Pro</td>
<td align="left">76.9%</td>
<td align="left">73.8%</td>
<td align="left">52.6%</td>
<td align="left">44.2%</td>
<td align="left">49.7%</td>
</tr>
<tr>
<td align="left">
OmniDocBench 1.5 (average edit distance, lower is better)
</td>
<td align="left">0.131</td>
<td align="left">0.149</td>
<td align="left">0.181</td>
<td align="left">0.290</td>
<td align="left">0.365</td>
</tr>
<tr>
<td align="left">MATH-Vision</td>
<td align="left">85.6%</td>
<td align="left">82.4%</td>
<td align="left">59.5%</td>
<td align="left">52.4%</td>
<td align="left">46.0%</td>
</tr>
<tr>
<td align="left">MedXPertQA MM</td>
<td align="left">61.3%</td>
<td align="left">58.1%</td>
<td align="left">28.7%</td>
<td align="left">23.5%</td>
<td align="left">-</td>
</tr>
<tr>
<td align="left"><strong>Audio</strong></td>
<td align="left">
<br />
</td>
<td align="left">
<br />
</td>
<td align="left">
<br />
</td>
<td align="left">
<br />
</td>
<td align="left">
<br />
</td>
</tr>
<tr>
<td align="left">CoVoST</td>
<td align="left">-</td>
<td align="left">-</td>
<td align="left">35.54</td>
<td align="left">33.47</td>
<td align="left">-</td>
</tr>
<tr>
<td align="left">FLEURS (lower is better)</td>
<td align="left">-</td>
<td align="left">-</td>
<td align="left">0.08</td>
<td align="left">0.09</td>
<td align="left">-</td>
</tr>
<tr>
<td align="left"><strong>Long Context</strong></td>
<td align="left">
<br />
</td>
<td align="left">
<br />
</td>
<td align="left">
<br />
</td>
<td align="left">
<br />
</td>
<td align="left">
<br />
</td>
</tr>
<tr>
<td align="left">MRCR v2 8 needle 128k (average)</td>
<td align="left">66.4%</td>
<td align="left">44.1%</td>
<td align="left">25.4%</td>
<td align="left">19.1%</td>
<td align="left">13.5%</td>
</tr>
</tbody>
</table>
<h2>Model information</h2>
<table>
<thead>
<tr>
<th align="left">Property</th>
<th align="left">E2B</th>
<th align="left">E4B</th>
<th align="left">31B Dense</th>
</tr>
</thead>
<tbody>
<tr>
<td align="left"><strong>Total Parameters</strong></td>
<td align="left">2.3B effective (5.1B with embeddings)</td>
<td align="left">4.5B effective (8B with embeddings)</td>
<td align="left">30.7B</td>
</tr>
<tr>
<td align="left"><strong>Layers</strong></td>
<td align="left">35</td>
<td align="left">42</td>
<td align="left">60</td>
</tr>
<tr>
<td align="left"><strong>Sliding Window</strong></td>
<td align="left">512 tokens</td>
<td align="left">512 tokens</td>
<td align="left">1024 tokens</td>
</tr>
<tr>
<td align="left"><strong>Context Length</strong></td>
<td align="left">128K tokens</td>
<td align="left">128K tokens</td>
<td align="left">256K tokens</td>
</tr>
<tr>
<td align="left"><strong>Vocabulary Size</strong></td>
<td align="left">262K</td>
<td align="left">262K</td>
<td align="left">262K</td>
</tr>
<tr>
<td align="left"><strong>Supported Modalities</strong></td>
<td align="left">Text, Image, Audio</td>
<td align="left">Text, Image, Audio</td>
<td align="left">Text, Image</td>
</tr>
<tr>
<td align="left"><strong>Vision Encoder Parameters</strong></td>
<td align="left"><em>~150M</em></td>
<td align="left"><em>~150M</em></td>
<td align="left"><em>~550M</em></td>
</tr>
<tr>
<td align="left"><strong>Audio Encoder Parameters</strong></td>
<td align="left"><em>~300M</em></td>
<td align="left"><em>~300M</em></td>
<td align="left">No Audio</td>
</tr>
</tbody>
</table>
<h3>Mixture-of-Experts (MoE) Model</h3>
<table>
<thead>
<tr>
<th align="left">Property</th>
<th align="left">26B A4B MoE</th>
</tr>
</thead>
<tbody>
<tr>
<td align="left"><strong>Total Parameters</strong></td>
<td align="left">25.2B</td>
</tr>
<tr>
<td align="left"><strong>Active Parameters</strong></td>
<td align="left">3.8B</td>
</tr>
<tr>
<td align="left"><strong>Layers</strong></td>
<td align="left">30</td>
</tr>
<tr>
<td align="left"><strong>Sliding Window</strong></td>
<td align="left">1024 tokens</td>
</tr>
<tr>
<td align="left"><strong>Context Length</strong></td>
<td align="left">256K tokens</td>
</tr>
<tr>
<td align="left"><strong>Vocabulary Size</strong></td>
<td align="left">262K</td>
</tr>
<tr>
<td align="left"><strong>Expert Count</strong></td>
<td align="left">8 active / 128 total and 1 shared</td>
</tr>
<tr>
<td align="left"><strong>Supported Modalities</strong></td>
<td align="left">Text, Image</td>
</tr>
<tr>
<td align="left"><strong>Vision Encoder Parameters</strong></td>
<td align="left"><em>~550M</em></td>
</tr>
</tbody>
</table>
<h2>Best Practices</h2>
<p>
For the best performance, use these configurations and best practices:
</p>
<h3>1. Sampling Parameters</h3>
<p>
Use the following standardized sampling configuration across all use
cases:
  </p>
  <ul>
  <li><code>temperature=1.0</code></li>
  <li><code>top_p=0.95</code></li>
  <li><code>top_k=64</code></li>
  </ul>
  <h3>2. Thinking Mode Configuration</h3>
  <blockquote>
  <p>
  Note that Ollama already handles the complexities of the chat template
  for you.
    </p>
    </blockquote>
    <p>
    Compared to Gemma 3, the models use standard
    <code>system</code>
    ,
<code>assistant</code>
, and
<code>user</code>
roles. To properly manage the thinking process, use the following control
tokens:
</p>
<ul>
<li>
<strong>Trigger Thinking:</strong>
Thinking is enabled by including the
<code>&lt;|think|&gt;</code>
token at the start of the system prompt. To disable thinking, remove the
token.
</li>
<li>
<strong>Standard Generation:</strong>
When thinking is enabled, the model will output its internal reasoning
followed by the final answer using this structure:
<br />
<code>&lt;|channel&gt;thought\n</code>
<strong>[Internal reasoning]</strong>
<code>&lt;channel|&gt;</code>
</li>
<li>
<strong>Disabled Thinking Behavior:</strong>
For all models except for the E2B and E4B variants, if thinking is
disabled, the model will still generate the tags but with an empty
thought block:
<br />
<code>&lt;|channel&gt;thought\n&lt;channel|&gt;</code>
<strong>[Final answer]</strong>
</li>
</ul>
<h3>3. Multi-Turn Conversations</h3>
<ul>
<li>
<strong>No Thinking Content in History</strong>
: In multi-turn conversations, the historical model output should only
include the final response. Thoughts from previous model turns must
<em>not be added</em>
before the next user turn begins.
</li>
</ul>
<h3>4. Modality order</h3>
<ul>
<li>
For optimal performance with multimodal inputs, place image and/or audio
content
<strong>before</strong>
the text in your prompt.
</li>
</ul>
<h3>5. Variable Image Resolution</h3>
<p>
Aside from variable aspect ratios, Gemma 4 supports variable image
resolution through a configurable visual token budget, which controls how
many tokens are used to represent an image. A higher token budget
preserves more visual detail
</p>
<p>
at the cost of additional compute, while a lower budget enables faster
inference for tasks that don’t require fine-grained understanding.
</p>
<ul>
<li>
The supported token budgets are:
<strong>70</strong>
,
<strong>140</strong>
,
<strong>280</strong>
,
<strong>560</strong>
, and
<strong>1120</strong>
.
<br />
<ul>
<li>
Use
<em>lower budgets</em>
for classification, captioning, or video understanding, where faster
  inference and processing many frames outweigh fine-grained detail.
  </li>
  <li>
  Use
  <em>higher budgets</em>
  for tasks like OCR, document parsing, or reading small text.
    </li>
    </ul>
    </li>
    </ul>
    <code>
    blissful_ishizaka_626/gemma4-cloud - 0.0 GB (Cloud + Vision) -
    gemma4:31b-cloud - 0.0 GB (Cloud) -&nbsp;
  </code>
  </details>
  <details>
  <summary>Kimi</summary>
  <p>
  <img
  class="fr-fil fr-dib"
  src="https://dufospy.com/storage/photos/shares/kimi.png"
  width="180"
  />
  </p>
  <p>
  Kimi K2.7 Code is a coding-focused agentic model built upon Kimi K2.6.
  With substantial improvements on real-world long-horizon coding tasks, it
  strengthens end-to-end task completion across complex software engineering
  workflows while improving token efficiency, reducing thinking-token usage
  by approximately 30% compared with Kimi K2.6.
  </p>
  <h3>Key Features</h3>
  <ul>
  <li>
  <strong>Long-horizon coding</strong>
  : Substantial gains on realistic, end-to-end software engineering tasks
  across 10+ programming languages and a full production tech stack,
spanning backend services, infrastructure, performance engineering,
systems programming, security, frontend, and ML/data engineering.
</li>
<li>
<strong>Improved token efficiency</strong>
: Reduces thinking-token usage by approximately 30% compared with Kimi
K2.6, while improving task completion on complex workflows.
</li>
<li>
<strong>Stronger agentic tool use</strong>
: Improved performance on multi-step tool calling and MCP-based
environments, with interleaved thinking preserved across turns (
  <code>preserve_thinking</code>
) for coherent multi-step coding sessions.
</li>
<li>
<strong>Native multimodal</strong>
: Supports image and video input via the MoonViT vision encoder, with a
256K token context window.
</li>
<li>kimi-k2.7-code:cloud</li>
<li>
kimi-k2.6:cloud - 0.0 GB (Cloud + Vision) - ⚡⚡⚡⚡ [ does well with
finga.studio ]
</li>
</ul>
</details>
<details>
<summary>Details Placeholder</summary>
</details>
</section>
<h2>Local Models Ordered by Size (ideally):</h2>
<ul>
<li>lfm2.5-thinking - 0.8 GB - ⚡</li>
<li>qwen3.5:0.8b - 1.0 GB - (not tested)</li>
<li>llama3.2:latest - 2.0 GB - ⚡⚡⚡</li>
<li>nemotron-mini:latest - 2.7 GB - ⚡⚡</li>
<li>mistral:latest - 4.4 GB - ⚡⚡⚡</li>
<li>gemma4:e2b - 7.2 GB - (not tested)</li>
<li>gemma4:latest - 9.6 GB - ⚡⚡⚡⚡</li>
<li>gpt-oss:latest - 13 GB - ⚡⚡⚡⚡</li>
</ul>
<h2>Tooling-Unsupported Models Used Successfully</h2>
<p>
These models are fine selections to use in a capable IDE, but without tools,
you'll be responsible for the
<em>physical</em>
editing. As mentioned under
<em><em>tooling-supported-models</em></em>
, tooling is the requirement that enables the model to edit files in an editor
like Kiro, VS Code, Zed, and Cursor, etc.
</p>
<p>
The LLM models which don't support tools are far from useless! E.g. you may be
surprised at how responsive the LLM is, running it with a command like
<code>ollama run qwen:latest</code>
, where no tooling is in the chain. The security profile is different from
using ChatGPT, or Gemini online because you're not sending any private
information across the network. Compare the concept to using web based LLM
like ChatGPT, MS Copilot, etc..
</p>
<ul>
<li>liquidai/lfm2.5-1.2b-instruct:q8_0 - 1.2 GB - ⚡⚡⚡⚡</li>
<li>
qwen:latest - 2.3 GB - ⚡⚡⚡ (a fine compromise if dont need tooling)
</li>
<li>gemma3:4b - 3.3 GB - ⚡⚡⚡</li>
</ul>
<section class="blockquote">
Pulled. No comment
<p><strong>Fedora 44:</strong></p>
</section>
<hr />
<details class="details-block">
<summary>TL;DR (For People Who Just Landed Here)</summary>
<p>
This page is not a step-by-step tutorial. It’s a map of the real dynamics
behind running LLMs locally with Ollama — the stuff you only learn after
you’ve broken things, waited too long for a model to load, or wondered why
your token meter suddenly exploded.
</p>
<ul>
<li>Local models load slowly because they must fit entirely in RAM.</li>
<li>Cloud models load instantly but have usage limits.</li>
<li>
Tooling support determines whether an LLM can edit files in your IDE.
</li>
<li>Smaller models start fast; larger models reason better.</li>
<li>
Sessions grow in cost because every message includes the full history.
</li>
</ul>
<p>
Everything else on this page expands those points in the places where the
official docs don’t.
</p>
</details>
<hr />
<details class="details-block">
<summary>Answers to Questions No One Has Asked (Yet)</summary>
<p>
Most people ask the obvious questions: “How do I install Ollama?” “What
model should I use?” “Why is it slow?”
</p>
<p>
This page is about the
<em>other</em>
questions — the ones you don’t know to ask until you’ve already spent hours
experimenting:
</p>
<ul>
<li>Why does the token meter accelerate?</li>
<li>When should you reset a session?</li>
<li>Which models actually support tooling?</li>
<li>Why does OpenClaw need Node 22+?</li>
<li>Why does a 2 GB model feel faster than a 7 GB one?</li>
<li>Why does “local” sometimes feel slower than “cloud”?</li>
</ul>
<p>
These aren’t beginner questions — they’re the questions that only appear
once you’ve gone deep enough to notice the edges.
</p>
</details>
<hr />
<details class="details-block">
<summary>Model Selection Cheat Sheet</summary>
<p>
A quick, opinionated guide for choosing a model without overthinking it:
</p>
<ul>
<li>
<strong>Need tools?</strong>
Use: gemma4:latest, gpt-oss, minimax-m2.7:cloud
</li>
<li>
<strong>Need speed?</strong>
Use: qwen3.5:0.8b, llama3.2, lfm2.5-thinking
</li>
<li>
<strong>Need reasoning?</strong>
Use: gemma4:latest, gpt-oss
</li>
<li>
<strong>Low RAM?</strong>
Use: qwen3.5:0.8b or llama3.2
</li>
<li>
<strong>Want zero load time?</strong>
Use any
<code>:cloud</code>
model
</li>
</ul>
<p>Rule of thumb: start small, move up only when you hit a wall.</p>
</details>
<hr />
<details class="details-block">
<summary>Troubleshooting Quicklist</summary>
<ul>
<li>
<strong>Model won’t load:</strong>
You don’t have enough RAM for that size.
</li>
<li>
<strong>OpenClaw errors:</strong>
Node must be 22+ (use
<code>nvm</code>
).
</li>
<li>
<strong>Tools not working:</strong>
The model probably doesn’t support tooling.
</li>
<li>
<strong>Slow startup:</strong>
First load is always slow; second load is cached.
</li>
<li>
<strong>Token meter exploding:</strong>
Long sessions resend full history every turn.
</li>
<li>
<strong>Cloud feels slow:</strong>
Output length matters more than load time.
</li>
</ul>
</details>
<hr />
<details class="details-block">
<summary>Glossary (Ollama-Specific)</summary>
<ul>
<li>
<strong>Modelfile:</strong>
A recipe describing how to build a custom model.
</li>
<li>
<strong>Template:</strong>
The system prompt + formatting rules for a model.
</li>
<li>
<strong>Context window:</strong>
How much conversation the model can remember.
</li>
<li>
<strong>Embedding:</strong>
A vector representation used for search or memory.
</li>
<li>
<strong>Tag:</strong>
The suffix after
<code>:</code>
(e.g.,
 <code>:latest</code>
 ,
 <code>:q4_0</code>
).
</li>
<li>
<strong>Tooling:</strong>
The model’s ability to edit files or run actions in an IDE.
</li>
</ul>
</details>
<hr />
<hr />
<h3>Related Work: CONTRACT‑Style‑Comments (CSC)</h3>
<div class="required">
Required
<span class="required-no">No</span>
</div>
<p>
The ideas explored in this article connect directly to my formalized framework
<strong>CONTRACT‑Style‑Comments</strong>
, now published as an open GitHub repository:
</p>
<p>
Access it the
<a
class="clutterFree_existingDuplicate cf_div_theme_dark"
href="https://github.com/ajaxStardust/CONTRACT-Style-Comments"
>
Contract-Style Comments
</a>
repo on
<strong>GitHub:</strong>
</p>
<p>
CSC provides a structured, three‑artifact governance model designed for both
human developers and stateless AI agents. It addresses the same core problem
discussed here:
<strong>
how to prevent architectural drift and comprehension debt in systems touched
by AI.
</strong>
</p>
<h3>Why CSC Matters in This Context</h3>
<ul>
<li>
It externalizes invariants into
<code>CONTRACT.md</code>
</li>
<li>
It externalizes reasoning into
<code>WHY.md</code>
</li>
<li>
It externalizes operational truth into
<code>QUICKSTART.md</code>
</li>
<li>It gives AI agents a safe, bounded interface</li>
<li>It reduces the cognitive load that fuels comprehension debt</li>
</ul>
<p>
If this article resonated with you, CSC offers a practical implementation of
the principles described here — a way to turn theory into operational clarity.
</p>
