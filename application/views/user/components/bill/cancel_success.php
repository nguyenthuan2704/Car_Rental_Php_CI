<script type="text/javascript">
    setTimeout(function(){
      window.location = "<?php echo base_url("index.html"); ?>";
    }, 3000);
</script>
<style type="text/css" media="screen">
@import "nib"

$brace-color = white;

body {
  font-family: "Montserrat", sans-serif;
  font-smoothing: antialiased;
  background-color: #fac564;
  background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/5908/food.png);
}

.container {
  padding: 25px 100px;
  max-width: 1200px;
  margin: 0 auto;
}

.document {
  background-color: rgba(#fac564,.5);
  padding: 40px 20px;
  border-radius: 5px;
}

.document__content {
  column-count: 1;
  @media screen and (min-width:1200px) {
    column-count: 2;
  }
  column-gap: 20px;
  padding: 20px 0;
  margin: 0 100px;
}

h1 {
  text-align: center;
  font-size: 3em;
  margin-bottom: 10px;
  text-transform: uppercase;
  font-weight: bold;
  color: white;
  text-shadow: 0 1px 2px rgba(black,.15);
}

p {
  margin: 0 20px 20px;
  font-size: 16px;
  line-height: 1.5em;
  color: lighten(black,20%);
}

.brace {
  width: auto;
  min-width: 35px;
  padding-bottom: 20px;
  font-size: 2em;
  line-height: 2em;
  position: relative;
  text-align: center;
  vertical-align: middle;
  margin: 0 15px 15px;
  border: none;
  background-color: transparent;
  background-image: 
    radial-gradient(circle at 0 0, rgba($brace-color,0) 14.5px, $brace-color 15.5px, $brace-color 19.5px, rgba($brace-color,0) 20.5px),
    radial-gradient(circle at 35px 0, rgba($brace-color,0) 14.5px, $brace-color 15.5px, $brace-color 19.5px, rgba($brace-color,0) 20.5px);
  background-size: 35px 20px;
  background-position: center bottom;
  background-repeat: no-repeat;
  text-transform: lowercase;
  font-style: italic;
  color: $brace-color;
  filter: drop-shadow(0 1px 1px rgba(black,.15));
  overflow: visible;
  
  &:before {
    width: 50%;
    border-top: 5px solid $brace-color;
    border-left: 1px solid transparent; /* play with this until you like the look of it */
    border-top-left-radius: 20% 30px;
    height: 100%;
    content: "";
    absolute: top @height left -15px;
    box-sizing: border-box;
    margin-top: -5px;
  }
  
  &:after {
    width: 50%;
    border-top: 5px solid $brace-color;
    border-right: 1px solid transparent; /* play with this until you like the look of it */
    border-top-right-radius: 20% 30px;
    height: 100%;
    content: "";
    absolute: top @height right -15px;
    box-sizing: border-box;
    margin-top: -5px;
  }
}
</style>
<div class="container">

  <div class="document">

    <h1>Hủy Đơn Hàng Thành Công!</h1>

    <hr class="brace">

    <div class="document__content">

      <p>Vui lòng đợi...trang sẽ tự động chuyển</p>

    </div>

  </div>

</div>