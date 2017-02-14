@extends('layout.admin-layout')

@section('reviews-list')
    <?php
    if(empty($reviews) && empty($reviewstablet) && empty($reviewslaptop)){
        echo "<h4 style='text-align: center'>Во моментов нема нови коментари за одобрување.</h4>";
    }else{
        if(!empty($reviews)){
            foreach ($reviews as $review){
                echo "<form action='/admin/review-comments' method='post'>
                        <div class='panel panel-info'>
                            <div class='panel-heading'>Објавено од :  $review->nickname</div>
                            <div class='panel-body'>$review->comment
                                <input type='submit' value='Одобри' name='approve' class='btn btn-default pull-right'>
                                <input type='submit' value='Избриши' name='delete' class='btn btn-default pull-right' style='margin-right: 10px;'>
                                <input type='number' name='id' value=\"$review->id\" hidden>
                            </div>
                        </div>
                  </form>";
            }
        }

        if(!empty($reviewstablet)){
            foreach ($reviewstablet as $review){
                echo "<form action='/admin/review-tablet-comments' method='post'>
                        <div class='panel panel-info'>
                            <div class='panel-heading'>Објавено од :  $review->nickname</div>
                            <div class='panel-body'>$review->comment
                                <input type='submit' value='Одобри' name='approve' class='btn btn-default pull-right'>
                                <input type='submit' value='Избриши' name='delete' class='btn btn-default pull-right' style='margin-right: 10px;'>
                                <input type='number' name='id' value=\"$review->id\" hidden>
                            </div>
                        </div>
                  </form>";
            }
        }

        if(!empty($reviewslaptop)){
            foreach ($reviewslaptop as $review){
                echo "<form action='/admin/review-laptop-comments' method='post'>
                        <div class='panel panel-info'>
                            <div class='panel-heading'>Објавено од :  $review->nickname</div>
                            <div class='panel-body'>$review->comment
                                <input type='submit' value='Одобри' name='approve' class='btn btn-default pull-right'>
                                <input type='submit' value='Избриши' name='delete' class='btn btn-default pull-right' style='margin-right: 10px;'>
                                <input type='number' name='id' value=\"$review->id\" hidden>
                            </div>
                        </div>
                  </form>";
            }
        }
    }
    ?>
@endsection