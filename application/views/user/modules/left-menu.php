<div class="menu-product">
    <h3>
        <span>
            <i class="fa fa-bars"></i>
            Sản phẩm
        </span>
    </h3>
<!--     <ul class='level0'>
        <li class="child">
            <span><a href='san-pham/toyota-1308.html'><i class='fa fa-arrow-circle-o-right'></i>TOYOTA</a></span>
            <span class='open-close'><i class='fa fa-angle-down'></i></span>
            <ul class='level1 hidden-xs'>
                <li><span><a href='san-pham/camry-7233.html'><i class='fa fa-check'></i>Camry</a></span></li>
                <li><span><a href='san-pham/vios-7234.html'><i class='fa fa-check'></i>Vios</a></span></li>
                <li><span><a href='san-pham/fortuner-7235.html'><i class='fa fa-check'></i>Fortuner</a></span></li>
            </ul class='level1 hidden-xs'>
        </li>
        <li><span><a href='san-pham/kia-1310.html'><i class='fa fa-arrow-circle-o-right'></i>KIA</a></span></li>
        <li><span><a href='san-pham/honda-1334.html'><i class='fa fa-arrow-circle-o-right'></i>HONDA</a></span></li>
        <li><span><a href='san-pham/ford-1313.html'><i class='fa fa-arrow-circle-o-right'></i>FORD</a></span></li>
        <li class="child">
            <span><a href='san-pham/audi-7230.html'><i class='fa fa-arrow-circle-o-right'></i>AUDI</a></span>
            <span class='open-close'><i class='fa fa-angle-down'></i></span>
            <ul class='level1 hidden-xs'>
                <li><span><a href='san-pham/a-7236.html'><i class='fa fa-check'></i>A</a></span></li>
                <li><span><a href='san-pham/q-7237.html'><i class='fa fa-check'></i>Q</a></span></li>
            </ul class='level1 hidden-xs'>
        </li>
        <li><span><a href='san-pham/bmw-7231.html'><i class='fa fa-arrow-circle-o-right'></i>BMW</a></span></li>
        <li><span><a href='san-pham/lamborghini-7232.html'><i class='fa fa-arrow-circle-o-right'></i>Lamborghini</a></span></li>
    </ul> -->
    <?php
        $vehicle_type = $this->vehicle_model->vehicle_type();
        foreach ($vehicle_type as $vt):
    ?>
    <ul class='level0'>
        <li class="child">
            <span><a href="<?php echo base_url("sanpham-theoloai/$vt->id.html"); ?>"><i class='fa fa-arrow-circle-o-right'></i><?php echo $vt->name; ?></a></span>
            <span class='open-close'><i class='fa fa-angle-down'></i></span>
            <?php
                $vehicle_type_id = $vt->id;
                $vehicle_brand = $this->vehicle_model->get_brand_by_type($vehicle_type_id);
                foreach ($vehicle_brand as $vb):
            ?>
            <ul class='level1 hidden-xs'>
                <li><span><a href="<?php echo base_url("sanpham-theothuonghieu/$vb->id.html"); ?>"><i class='fa fa-check'></i><?php echo $vb->name; ?></a></span></li>
            </ul class='level1 hidden-xs'>
            <?php endforeach; ?>
        </li>
    </ul>
    <?php endforeach; ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
    $('.menu-product li.child .open-close').on('click', function () {
    $(this).removeAttr('href');
    var element = $(this).parent('li');
    if (element.hasClass('open')) {
    element.removeClass('open');
    element.children('ul').slideUp();
    }
    else {
    element.addClass('open');
    element.children('ul').slideDown();
    }
    });
    });
</script>