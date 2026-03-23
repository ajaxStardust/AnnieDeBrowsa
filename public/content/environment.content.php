        <!-- Environment Info -->
        <section class="bg-white-60 pv3 ph3 bt b--light-gray">
            <div class="mw9 center">
                <div class="grid-2">
                    <div>
                        <p class="ma0 f6 gray">Location:</p>
                        <p class="ma0 f5 mono"><?= __FILE__; ?></p>
                    </div>
                    <div>
                        <p class="ma0 f6 gray">Base Path:</p>
                        <p class="ma0 f5 mono"><?php echo isset($Env->initialize_enviornment["abspathtml"]) ? $Env->initialize_enviornment["abspathtml"] : 'Not set'; ?></p>
                    </div>
            <div>
                        <p class="ma0 f6 gray">Server Type:</p>
                        <p class="ma0 f5 mono"><?= $_SERVER["SERVER_SOFTWARE"]; ?></p>
                    </div>
                    <div>
                        <p class="ma0 f6 gray">Server Name:</p>
                        <p class="ma0 f5 mono"><?= $_SERVER["SERVER_NAME"]; ?></p>
                    </div>
                    <div>
                        <p class="ma0 f6 gray">ADB Main Page:</p>
                        <p class="ma0 f5 mono"><a href="../">Go Home</a></p>
                    </div>
                </div>
            </div>
        </section>
