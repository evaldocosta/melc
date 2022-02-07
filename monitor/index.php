<?php
require 'autoload.php';
$Config = new Config();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="5" />
    <title>MELC Genomics - Framework for DNA Assembly</title>
    <link rel="stylesheet" href="web/css/utilities.css" type="text/css">
    <link rel="stylesheet" href="web/css/frontend.css" type="text/css">
    <script src="js/plugins/jquery-2.1.0.min.js" type="text/javascript"></script>
    <script src="js/plugins/jquery.knob.js" type="text/javascript"></script>
    <script src="js/esm.js" type="text/javascript"></script>
    <script>
    $(function(){
        $('.gauge').knob({
            'fontWeight': 'normal',
            'format' : function (value) {
                return value + '%';
            }
        });

        $('a.reload').click(function(e){
            e.preventDefault();
        });

        esm.getAll();

    });
    </script>
</head>

<body class="theme-<?php echo $Config->get('esm:theme'); ?>">

<br>

    <div class="box column-left" id="esm-system">
        <div class="box-header">
            <h1>System</h1>
        </div>

        <div class="box-content">
            <table class="firstBold">
                <tbody>
                    <tr>
                        <td>Hostname</td>
                        <td id="system-hostname"></td>
                    </tr>
                    <tr>
                        <td>OS</td>
                        <td id="system-os"></td>
                    </tr>
                    <tr>
                        <td>Kernel version</td>
                        <td id="system-kernel"></td>
                    </tr>
                    <tr>
                        <td>Uptime</td>
                        <td id="system-uptime"></td>
                    </tr>
                    <tr>
                        <td>Server date & time</td>
                        <td id="system-server_date"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="box column-right" id="esm-load_average">
        <div class="box-header">
            <h1>Load Average</h1>
        </div>

        <div class="box-content t-center">
            <div class="f-left w33p">
                <h3>1 min</h3>
                <input type="text" class="gauge" id="load-average_1" value="0" data-height="100" data-width="150" data-min="0" data-max="100" data-readOnly="true" data-fgColor="#BED7EB" data-angleOffset="-90" data-angleArc="180">
            </div>

            <div class="f-right w33p">
                <h3>15 min</h3>
                <input type="text" class="gauge" id="load-average_15" value="0" data-height="100" data-width="150" data-min="0" data-max="100" data-readOnly="true" data-fgColor="#BED7EB" data-angleOffset="-90" data-angleArc="180">
            </div>

            <div class="t-center">
                <h3>5 min</h3>
                <input type="text" class="gauge" id="load-average_5" value="0" data-height="100" data-width="150" data-min="0" data-max="100" data-readOnly="true" data-fgColor="#BED7EB" data-angleOffset="-90" data-angleArc="180">
            </div>
        </div>
    </div>


    <div class="box column-right" id="esm-gpu">

        <div class="box-header">
            <h1>GPU</h1>
        </div>

        <div class="box-content">
            <table class="firstBold">
                <tbody>
                    <tr>
                        <td>Model</td>
			<td>
                        <?php
			$system = shell_exec('nvidia-smi --query-gpu=gpu_name --format=csv,noheader | head -1');
			echo "$system";
			?>
			</td>
                    </tr>
                    <tr>
                        <td>Clock</td>
                        <td>
                        <?php
                        $system = shell_exec('nvidia-smi --query-gpu=clocks.sm --format=csv,noheader | head -1');
                        echo "$system";
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td>BIOS</td>
                        <td>
                        <?php
                        $system = shell_exec('nvidia-smi --query-gpu=vbios_version --format=csv,noheader| head -1');
                        echo "$system";
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Version</td>
                        <td>
                        <?php
                        $system = shell_exec('nvidia-smi --query-gpu=driver_version --format=csv,noheader| head -1');
                        echo "$system";
                        ?>
                        </td>
                    </tr>


                    <tr>
                        <td>Temperature</td>
                        <td>
                        <?php
                        $system = shell_exec('nvidia-smi --query-gpu=temperature.gpu --format=csv,noheader');
                        echo "$system °C";
                        ?>
                        </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="box column-left" id="esm-cpu">

        <div class="box-header">
            <h1>CPU</h1>
        </div>

        <div class="box-content">
            <table class="firstBold">
                <tbody>
                    <tr>
                        <td>Model</td>
                        <td id="cpu-model"></td>
                    </tr>
                    <tr>
                        <td>Cores</td>
                        <td id="cpu-num_cores"></td>
                    </tr>
                    <tr>
                        <td>Speed</td>
                        <td id="cpu-frequency"></td>
                    </tr>
                    <tr>
                        <td>Cache</td>
                        <td id="cpu-cache"></td>
                    </tr>
                    <?php if ($Config->get('cpu:enable_temperature')): ?>
                        <tr>
                            <td>Temperature</td>
                            <td id="cpu-temp"></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="cls"></div>



    <div class="box" id="esm-disk">
        <div class="box-header">
            <h1>Disk usage</h1>
        </div>

        <div class="box-content">
            <table>
                <thead>
                    <tr>
                        <?php if ($Config->get('disk:show_filesystem')): ?>
                            <th class="w10p filesystem">Filesystem</th>
                        <?php endif; ?>
                        <th class="w20p">Mount</th>
                        <th>Use</th>
                        <th class="w15p">Free</th>
                        <th class="w15p">Used</th>
                        <th class="w15p">Total</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="box column-left" id="esm-memory">
        <div class="box-header">
            <h1>Memory</h1>
        </div>

        <div class="box-content">
            <table class="firstBold">
                <tbody>
                    <tr>
                        <td class="w20p">Used %</td>
                        <td><div class="progressbar-wrap"><div class="progressbar" style="width: 0%;">0%</div></div></td>
                    </tr>
                    <tr>
                        <td class="w20p">Used</td>
                        <td id="memory-used"></td>
                    </tr>
                    <tr>
                        <td class="w20p">Free</td>
                        <td id="memory-free"></td>
                    </tr>
                    <tr>
                        <td class="w20p">Total</td>
                        <td id="memory-total"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="box column-right" id="esm-swap">
        <div class="box-header">
            <h1>Swap</h1>
        </div>

        <div class="box-content">
            <table class="firstBold">
                <tbody>
                    <tr>
                        <td class="w20p">Used %</td>
                        <td><div class="progressbar-wrap"><div class="progressbar" style="width: 0%;">0%</div></div></td>
                    </tr>
                    <tr>
                        <td class="w20p">Used</td>
                        <td id="swap-used"></td>
                    </tr>
                    <tr>
                        <td class="w20p">Free</td>
                        <td id="swap-free"></td>
                    </tr>
                    <tr>
                        <td class="w20p">Total</td>
                        <td id="swap-total"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="cls"></div>


</body>
</html>
