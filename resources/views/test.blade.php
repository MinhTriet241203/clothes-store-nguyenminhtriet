<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Category List</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logoWebsite.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/css/apex-charts.css') }}" />

    <!-- Kit code for icons -->
    <script src="https://kit.fontawesome.com/1c6258baf1.js" crossorigin="anonymous"></script>

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('vendor/js/config.js') }}"></script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('vendor/js/jquery.js') }}"></script>
    <script src="{{ asset('vendor/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/js/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('vendor/js/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('vendor/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('vendor/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- JS for charts -->
    <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-pie.min.js"></script>
  </head>
  <body style="width: 100%; height: 100%; margin: 0; padding: 0; ">  
    <div id="container" style="width: 100%; height: 100%; margin: 0; padding: 0; "></div>
    <script>

anychart.onDocumentReady(function () {
  
  // add data
  var data = anychart.data.set([
    ['Spotify', 34],
    ['Apple Music', 21],
    ['Amazon Music', 15],
    ['Tencent apps', 11],
    ['YouTube Music', 6],
    ['Others', 13]
  ]);
  
  // create a pie chart with the data
  var chart = anychart.pie(data);
  
  // set the chart radius making a donut chart
  chart.innerRadius('55%')

  // create a color palette
  var palette = anychart.palettes.distinctColors();
 
  // set the colors according to the brands
  palette.items([
    { color: '#1dd05d' },
    { color: '#000000' },
    { color: '#00a3da' },
    { color: '#156ef2' },
    { color: '#f60000' },
    { color: '#96a6a6' }
  ]);

  // apply the donut chart color palette
  chart.palette(palette);
  
  // set the position of labels
  chart.labels().format('{%x} — {%y}%').fontSize(16);
  
  // disable the legend
  chart.legend(false);
  
  // format the donut chart tooltip
  chart.tooltip().format('Market share: {%PercentValue}%');

  // create a standalone label
  var label = anychart.standalones.label();

  // configure the label settings
  label
    .useHtml(true)
    .text(
      '<span style = "color: #313136; font-size:20px;">Global Market Share of <br/> Music Streaming Apps</span>' +
      '<br/><br/></br><span style="color:#444857; font-size: 14px;"><i>Spotify and Apple Music have more <br/>than 50% of the total market share</i></span>'
    )
    .position('center')
    .anchor('center')
    .hAlign('center')
    .vAlign('middle');
  
  // set the label as the center content
  chart.center().content(label);
  
  // set container id for the chart
  chart.container('container');
  
  // initiate chart drawing
  chart.draw();

});

    </script>
  </body>
</html>