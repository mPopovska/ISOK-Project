@extends('layout.main')

@section('carousel')
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

            <div class="item active">
                <img src="images\surface1.jpg" alt="Chania" width="460" height="345">
            </div>

            <div class="item">
                <img src="images\surface2.jpg" alt="Chania" width="460" height="345">
            </div>

            <div class="item">
                <img src="images\surface3.jpg" alt="Flower" width="460" height="345">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endsection

@section('subcontent1')
    <div style="width: 1100px; margin: auto">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#phones">Мобилни</a></li>
            <li><a data-toggle="tab" href="#laptops">Лаптопи</a></li>
            <li><a data-toggle="tab" href="#tablets">Таблети</a></li>
        </ul>

        <div class="tab-content">
            <div id="phones" class="tab-pane fade in active" style="margin-bottom: 50px">
                <?php
                if(!empty($phones)){
                    foreach ($phones as $phone){
                        echo "
                        <div class='col-sm-4'>
                                <div class='panel-group'>
                                    <div class='panel panel-info'>
                                        <div class='panel-heading'><p style='text-align: center'>$phone->name</p></div>
                                        <div class='panel-body'><img width='160' height='212' src=\"$phone->img\"style=\"display: block; margin-left: auto; margin-right: auto\"><br>
                                            <h3 style='text-align: center'>$phone->just_device ден</h3><br><p style='text-align: center'>Цена на уредот</p><br>
                                            <form action='/laptop_details' method='get'>
                                                <input type='number' name='laptop_id' value=$phone->id hidden>
                                                <input type='text' name='model' value=$phone->name hidden>
                                                <input class='btn btn-info' type='submit' value='Детали' style='margin: auto; display: block'>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    ";
                    }
                }else{
                    echo "<div class='col-sm-4'>
                                <h4>Бо моментов немаме мобилни уреди!</h4>
                            </div>";
                }
                ?>
            </div>
            <div id="laptops" class="tab-pane fade" style="margin-bottom: 50px">
                <?php
                if(!empty($laptops)){
                    foreach ($laptops as $laptop){
                        echo "
                        <div class='col-sm-4'>
                                <div class='panel-group'>
                                    <div class='panel panel-info'>
                                        <div class='panel-heading'><p style='text-align: center'>$laptop->name</p></div>
                                        <div class='panel-body'><img width='160' height='212' src=\"$laptop->img\"style=\"display: block; margin-left: auto; margin-right: auto\"><br>
                                            <h3 style='text-align: center'>$laptop->price ден</h3><br><p style='text-align: center'>Цена на уредот</p><br>
                                            <form action='/laptop_details' method='get'>
                                                <input type='number' name='laptop_id' value=$laptop->id hidden>
                                                <input type='text' name='model' value=$laptop->name hidden>
                                                <input class='btn btn-info' type='submit' value='Детали' style='margin: auto; display: block'>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    ";
                    }
                }else{
                    echo "<div class='col-sm-4'>
                                <h4>Бо моментов немаме лаптоп уреди!</h4>
                            </div>";
                }
                ?>
            </div>
            <div id="tablets" class="tab-pane fade" style="margin-bottom: 50px">
                <?php
                if(!empty($tablets)){
                    foreach ($tablets as $tablet){
                        echo "
                        <div class='col-sm-4'>
                                <div class='panel-group'>
                                    <div class='panel panel-info'>
                                        <div class='panel-heading'><p style='text-align: center'>$tablet->name</p></div>
                                        <div class='panel-body'><img width='160' height='212' src=\"$tablet->img\"style=\"display: block; margin-left: auto; margin-right: auto\"><br>
                                            <h3 style='text-align: center'>$tablet->just_device ден</h3><br><p style='text-align: center'>Цена на уредот</p><br>
                                            <form action='/laptop_details' method='get'>
                                                <input type='number' name='laptop_id' value=$tablet->id hidden>
                                                <input type='text' name='model' value=$tablet->name hidden>
                                                <input class='btn btn-info' type='submit' value='Детали' style='margin: auto; display: block'>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    ";
                    }
                }else{
                    echo "<div class='col-sm-4'>
                                <h4>Бо моментов немаме таблет уреди!</h4>
                            </div>";
                }
                ?>
            </div>
        </div>
    </div>
@endsection