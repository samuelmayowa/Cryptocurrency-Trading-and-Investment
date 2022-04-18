 <div class="tradingview-widget-container">
  <div id="tradingview_f933e"></div>
  <div class="tradingview-widget-copyright"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "width": "100%",
  "height": "450",
  "symbol": "COINBASE:<?php echo $base.$quote; ?>",
  "interval": "1",
  "timezone": "Etc/UTC",
  "theme": "<?php echo e(Auth::user()->dashboard_style); ?>",
  "style": "10",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "hide_side_toolbar": false,
  "allow_symbol_change": true,
  "calendar": false,
  "studies": [
    "BB@tv-basicstudies"
  ],
  "container_id": "tradingview_f933e"
}
  );
  </script>
</div>
