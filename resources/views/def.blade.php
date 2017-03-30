
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Useful definitions</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                margin: 20;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .title {
                font-size: 50px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="position-ref full-height">
            <div>
                <div class="title m-b-md">
                    Useful Networking Definitions
                </div>
                <ul>
                    <li><b>Every device on the internet has a unique IP address.</b> The IP address is included in data packets transmitted to other computers.</li>
                    <li><b>MAC address</b> Every piece of hardware on a network has a unique MAC address. This is embedded in the hardware when the product is made in the factory, and the user cannot change it.</li>
                    <li>The chip and socket (or wireless transmitter) that allows a computer (or other device) to connect to a network is called a <b>Network interface</b>. The physical socket on the network interface is called a <b>port</b></li>
                    <li>Every <b>Network Interface</b> has a <b>unique MAC address</b></li>
                    <li>When a device transmits data to another computer outside its LAN a device on the network called a <b>Gateway</b> decides if traffic is to be <b>routed</b> across the internet or just locally on the LAN.</li>
                    <li>When a computer is booted (turned on) it is assigned an <b>IP address</b> and told where the <b>Default Gateway</b> is.
                </ul>
                <div class="title m-b-md">
                    Useful Networking Tools - ifconfig
                </div>
                <ul>
                    <li>A tool for viewing and configuring a computers Network Interfaces is <tt>ifconfig</tt> its name comes from "<b>I</b>nter<b>f</b>ace <b>Config</b>uration"</li>
                    <li>Each Network Interface in a computer is given a unique name by the operating system for example <b>eth0</b>, <b>eth1</b> etc.</li> The interfaces named <b>eth</b> are using Ethernet.
                    <li>Ethernet is a network protocol that controls how data is transmitted over a LAN.</li>
                    <li><tt>ifconfig</tt> lists information about each interface. For example, The IP address, if the device is connected to a network or not, and how much information it has sent and recenved (RX and TX values)</li>
                    <li><tt>ifconfig</tt>can also list an interface's MAC address. The interface lins together the IP address and the MAC address. IP address used for routing over the Internet, MAC address used to identify an Interface on the LAN.</li>
                </ul>
                <div class="title m-b-md">
                    Useful Networking Tools - ip
                </div>
                <ul>
                    <li>The <b>IP</b> command shows and edits information about <b>routing</b></li>
                    <li><b>Routing</b> is the way in which data is sent via many intermediate computers to reach the correct end computer. Each computer knows a few routes.</li>
                    <li>The first place a computer sending information to the Internet sends data is to the <b>Gateway</b> on its LAN.</li>
                    <li>The command <tt>ip route</tt> can display the <b>routes</b> a computer knows about.</li>
                    <li>The line in the <tt>ip route</tt> output containing the word 'default' is the route to the <b>default gateway</b>.
                </ul>
            </div>
        </div>
    </body>
</html>
