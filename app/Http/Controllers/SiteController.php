<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 15.1.2017
 * Time: 12:39
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
class SiteController extends Controller{

    public function display_comments(){
        $reviews=DB::table('reviews')->where('approve', 0)->get();
        $reviewstablet=DB::table('tabletsreview')->where('approve', 0)->get();
        $reviewslaptop=DB::table('laptopsreview')->where('approve', 0)->get();
        return view('pages.admin-reviews', ['reviews'=>$reviews, 'reviewstablet'=>$reviewstablet, 'reviewslaptop'=>$reviewslaptop]);
    }

    public function display_insert_device_form(){
        return view('pages.admin-insert-device');
    }

    public function submit_phone_comment(){
        if(!empty($_POST)){
            if(!empty($_POST['nickname']) && !empty($_POST['comment'])){
                DB::table('reviews')->insert(
                    [
                        'nickname'=> $_POST['nickname'],
                        'comment'=>$_POST['comment'],
                        'phone_id'=>$_POST['phone_id'],
                        'approve'=>0
                    ]
                );
            }
        }
        return redirect("http://localhost:8000/phone_details?phone_id={$_POST['phone_id']}&model={$_POST['phone_model']}");
    }

    public function submit_tablet_comment(){
        if(!empty($_POST)){
            if(!empty($_POST['nickname']) && !empty($_POST['comment'])){
                DB::table('tabletsreview')->insert(
                    [
                        'nickname'=> $_POST['nickname'],
                        'comment'=>$_POST['comment'],
                        'tablet_id'=>$_POST['tablet_id'],
                        'approve'=>0
                    ]
                );
            }
        }
        return redirect("http://localhost:8000/tablet_details?tablet_id={$_POST['tablet_id']}&model={$_POST['tablet_model']}");
    }

    public function submit_laptop_comment(){
        if(!empty($_POST)){
            if(!empty($_POST['nickname']) && !empty($_POST['comment'])){
                DB::table('laptopsreview')->insert(
                    [
                        'nickname'=> $_POST['nickname'],
                        'comment'=>$_POST['comment'],
                        'laptop_id'=>$_POST['laptop_id'],
                        'approve'=>0
                    ]
                );
            }
        }
        return redirect("http://localhost:8000/laptop_details?laptop_id={$_POST['laptop_id']}&model={$_POST['laptop_model']}");
    }

    public function approve_review(){
        if(!empty($_POST)){
            if(!empty($_POST['approve'])){
                DB::table('reviews')->where('id', $_POST['id'])->update(['approve' => 1]);
            }else if(!empty($_POST['delete'])){
                DB::table('reviews')->where('id', $_POST['id'])->delete();
            }
        }

        return redirect('http://localhost:8000/admin/review-comments');
    }

    public function approve_tablet_review(){
        if(!empty($_POST)){
            if(!empty($_POST['approve'])){
                DB::table('tabletsreview')->where('id', $_POST['id'])->update(['approve' => 1]);
            }else if(!empty($_POST['delete'])){
                DB::table('tabletsreview')->where('id', $_POST['id'])->delete();
            }
        }

        return redirect('http://localhost:8000/admin/review-comments');
    }

    public function approve_laptop_review(){
        if(!empty($_POST)){
            if(!empty($_POST['approve'])){
                DB::table('laptopsreview')->where('id', $_POST['id'])->update(['approve' => 1]);
            }else if(!empty($_POST['delete'])){
                DB::table('laptopsreview')->where('id', $_POST['id'])->delete();
            }
        }

        return redirect('http://localhost:8000/admin/review-comments');
    }

    public function phone_details(){
        $model=$_GET['phone_id'];
        $phone=DB::table('phones')->join('price', 'phones.id', '=', 'price.phone_id')->select('phones.id', 'phones.img', 'phones.screen', 'phones.primary_camera', 'phones.secondary_camera', 'phones.os', 'phones.ram', 'phones.rom', 'phones.cpu', 'phones.gps', 'phones.wifi', 'phones.bluetooth', 'phones.battery', 'phones.weight', 'phones.name', 'phones.code_name',
            'price.just_device', 'price.smart_s', 'price.smart_m', 'price.smart_l', 'price.magenta_s', 'price.magenta_m', 'price.magenta_l')->where('phones.id', $model)->first();

        $reviews=DB::table('reviews')->where('reviews.approve', 1)->where('reviews.phone_id',$model)->get();
        return view('pages.phone_details', ['phone'=>$phone, 'reviews'=>$reviews]);
    }

    public function tablet_details(){
        $model=$_GET['tablet_id'];
        $tablet=DB::table('tablets')->join('tabletsprices', 'tablets.id', '=', 'tabletsprices.tablet_id')->select('tablets.id', 'tablets.img', 'tablets.screen', 'tablets.primary_camera', 'tablets.secondary_camera', 'tablets.os', 'tablets.ram', 'tablets.rom', 'tablets.cpu', 'tablets.gps', 'tablets.wifi', 'tablets.bluetooth', 'tablets.battery', 'tablets.weight', 'tablets.name', 'tablets.code_name',
            'tabletsprices.just_device', 'tabletsprices.smart_s', 'tabletsprices.smart_m', 'tabletsprices.smart_l', 'tabletsprices.magenta_s', 'tabletsprices.magenta_m', 'tabletsprices.magenta_l')->where('tablets.id', $model)->first();

        $reviews=DB::table('tabletsreview')->where('tabletsreview.approve', 1)->where('tabletsreview.tablet_id',$model)->get();
        return view('pages.tablet_details', ['tablet'=>$tablet, 'reviews'=>$reviews]);
    }

    public function laptop_details(){
        $model=$_GET['laptop_id'];
        $laptop=DB::table('laptops')->first();
        $reviews=DB::table('laptopsreview')->where('laptopsreview.approve', 1)->where('laptopsreview.laptop_id', $model)->get();
        return view('pages.laptop_details', ['laptop'=>$laptop, 'reviews'=>$reviews]);
    }

    public function add_phone(){
        if(!empty($_POST)){

            $id=DB::table('phones')->insertGetId(
                ['img'=>$_POST['img'], 'screen'=>$_POST['screen'], 'primary_camera'=>$_POST['primary_camera'], 'secondary_camera'=>$_POST['secondary_camera'],
                'os'=>$_POST['os'], 'ram'=>$_POST['ram'], 'rom'=>$_POST['rom'], 'cpu'=>$_POST['cpu'], 'gps'=>$_POST['gps'], 'wifi'=>$_POST['wifi'], 'bluetooth'=>$_POST['bluetooth'],
                'battery'=>$_POST['battery'], 'weight'=>$_POST['weight'], 'name'=>$_POST['name'], 'code_name'=>$_POST['code_name']]
            );

            DB::table('price')->insert(
                ['just_device'=>$_POST['just_device'], 'smart_s'=>$_POST['smart_s'], 'smart_m'=>$_POST['smart_m'], 'smart_l'=>$_POST['smart_l'],
                'magenta_s'=>$_POST['magenta_s'], 'magenta_m'=>$_POST['magenta_m'], 'magenta_l'=>$_POST['magenta_l'], 'phone_id'=>$id]
            );
        }
        return view('pages.admin-insert-device');
    }

    public function add_tablet(){
        if(!empty($_POST)){

            $id=DB::table('tablets')->insertGetId(
                ['img'=>$_POST['tabimg'], 'screen'=>$_POST['tabscreen'], 'primary_camera'=>$_POST['tabprimary_camera'], 'secondary_camera'=>$_POST['tabsecondary_camera'],
                    'os'=>$_POST['tabos'], 'ram'=>$_POST['tabram'], 'rom'=>$_POST['tabrom'], 'cpu'=>$_POST['tabcpu'], 'gps'=>$_POST['tabgps'], 'wifi'=>$_POST['tabwifi'], 'bluetooth'=>$_POST['tabbluetooth'],
                    'battery'=>$_POST['tabbattery'], 'weight'=>$_POST['tabweight'], 'name'=>$_POST['tabname'], 'code_name'=>$_POST['tabcode_name']]
            );

            DB::table('tabletsprices')->insert(
                ['just_device'=>$_POST['tabjust_device'], 'smart_s'=>$_POST['tabsmart_s'], 'smart_m'=>$_POST['tabsmart_m'], 'smart_l'=>$_POST['tabsmart_l'],
                    'magenta_s'=>$_POST['tabmagenta_s'], 'magenta_m'=>$_POST['tabmagenta_m'], 'magenta_l'=>$_POST['tabmagenta_l'], 'tablet_id'=>$id]
            );
        }
        return view('pages.admin-insert-device');
    }

    public function add_laptop(){
        if(!empty($_POST)){
            DB::table('laptops')->insert(
                ['name'=>$_POST['laptopname'], 'img'=>$_POST['laptopimg'], 'processor'=>$_POST['laptopcpu'], 'memory'=>$_POST['laptopram'], 'hard_disk'=>$_POST['laptophdd'],
                'monitor'=>$_POST['laptopmonitor'], 'screen_size'=>$_POST['laptopscreensize'], 'dvd'=>$_POST['laptopdvd'], 'graphics'=>$_POST['laptopgpu'],
                'network_card'=>$_POST['laptopnetworkcard'], 'camera'=>$_POST['laptopcamera'], 'os'=>$_POST['laptopos'], 'ports'=>$_POST['laptopports'], 'battery'=>$_POST['laptopbattery'],
                'dimensions'=>$_POST['laptopdimensions'], 'weight'=>$_POST['laptopweight'], 'warranty'=>$_POST['laptopwarranty'], 'code'=>$_POST['laptopcode'], 'price'=>$_POST['laptopprice']]
            );
        }
        return view('pages.admin-insert-device');
    }

    public function index(){
        $laptops=DB::table('laptops')->paginate(3);
        $phones=DB::table('phones')->join('price', 'phones.id', '=', 'price.phone_id')->select('phones.id', 'phones.img', 'phones.screen', 'phones.primary_camera', 'phones.secondary_camera', 'phones.os', 'phones.ram', 'phones.rom', 'phones.cpu', 'phones.gps', 'phones.wifi', 'phones.bluetooth', 'phones.battery', 'phones.weight', 'phones.name', 'phones.code_name',
            'price.just_device', 'price.smart_s', 'price.smart_m', 'price.smart_l', 'price.magenta_s', 'price.magenta_m', 'price.magenta_l')->paginate(3);
        $tablets=DB::table('tablets')->join('tabletsprices', 'tablets.id', '=', 'tabletsprices.tablet_id')->select('tablets.id', 'tablets.img', 'tablets.screen', 'tablets.primary_camera', 'tablets.secondary_camera', 'tablets.os', 'tablets.ram', 'tablets.rom', 'tablets.cpu', 'tablets.gps', 'tablets.wifi', 'tablets.bluetooth', 'tablets.battery', 'tablets.weight', 'tablets.name', 'tablets.code_name',
            'tabletsprices.just_device', 'tabletsprices.smart_s', 'tabletsprices.smart_m', 'tabletsprices.smart_l', 'tabletsprices.magenta_s', 'tabletsprices.magenta_m', 'tabletsprices.magenta_l')->paginate(3);
        return view('pages.index', ['laptops'=>$laptops, 'phones'=>$phones, 'tablets'=>$tablets]);
    }

    public function phones(){
        if(empty($_GET)){
            $phones=DB::table('phones')->join('price', 'phones.id', '=', 'price.phone_id')->select('phones.id', 'phones.img', 'phones.screen', 'phones.primary_camera', 'phones.secondary_camera', 'phones.os', 'phones.ram', 'phones.rom', 'phones.cpu', 'phones.gps', 'phones.wifi', 'phones.bluetooth', 'phones.battery', 'phones.weight', 'phones.name', 'phones.code_name',
                'price.just_device', 'price.smart_s', 'price.smart_m', 'price.smart_l', 'price.magenta_s', 'price.magenta_m', 'price.magenta_l')->get();
            return view('pages.phones', ['phones'=>$phones]);
        }else{
            if(!empty($_GET['sort']) && !empty($_GET['phone_check_list']) && !empty($_GET['tarifa']) && $_GET['sort'] == 'ascending'){
                $query=DB::table('phones')->join('price', 'phones.id', '=', 'price.phone_id')->select('phones.id', 'phones.img', 'phones.screen', 'phones.primary_camera', 'phones.secondary_camera', 'phones.os', 'phones.ram', 'phones.rom', 'phones.cpu', 'phones.gps', 'phones.wifi', 'phones.bluetooth', 'phones.battery', 'phones.weight', 'phones.name', 'phones.code_name',
                    'price.just_device', 'price.smart_s', 'price.smart_m', 'price.smart_l', 'price.magenta_s', 'price.magenta_m', 'price.magenta_l');
                foreach ($_GET['phone_check_list'] as $item){
                    $query->orWhere('code_name', $item);
                }
                $query->orderBy('just_device', 'asc');
                $phones=$query->get();
                $tarifa = $_GET['tarifa'];
                return view('pages.phones', ['phones'=>$phones, 'tarifa'=>$tarifa]);
            }else if(!empty($_GET['sort']) && !empty($_GET['phone_check_list']) && !empty($_GET['tarifa']) && $_GET['sort'] == 'descending'){
                $query=DB::table('phones')->join('price', 'phones.id', '=', 'price.phone_id')->select('phones.id', 'phones.img', 'phones.screen', 'phones.primary_camera', 'phones.secondary_camera', 'phones.os', 'phones.ram', 'phones.rom', 'phones.cpu', 'phones.gps', 'phones.wifi', 'phones.bluetooth', 'phones.battery', 'phones.weight', 'phones.name', 'phones.code_name',
                    'price.just_device', 'price.smart_s', 'price.smart_m', 'price.smart_l', 'price.magenta_s', 'price.magenta_m', 'price.magenta_l');
                foreach ($_GET['phone_check_list'] as $item){
                    $query->orWhere('code_name', $item);
                }
                $query->orderBy('just_device', 'desc');
                $phones=$query->get();
                $tarifa = $_GET['tarifa'];
                return view('pages.phones', ['phones'=>$phones, 'tarifa'=>$tarifa]);
            }else if(!empty($_GET['sort']) && !empty($_GET['phone_check_list'])  && $_GET['sort'] == 'ascending'){
                $query=DB::table('phones')->join('price', 'phones.id', '=', 'price.phone_id')->select('phones.id', 'phones.img', 'phones.screen', 'phones.primary_camera', 'phones.secondary_camera', 'phones.os', 'phones.ram', 'phones.rom', 'phones.cpu', 'phones.gps', 'phones.wifi', 'phones.bluetooth', 'phones.battery', 'phones.weight', 'phones.name', 'phones.code_name',
                    'price.just_device', 'price.smart_s', 'price.smart_m', 'price.smart_l', 'price.magenta_s', 'price.magenta_m', 'price.magenta_l');
                foreach ($_GET['phone_check_list'] as $item){
                    $query->orWhere('code_name', $item);
                }
                $query->orderBy('just_device', 'asc');
                $phones=$query->get();
                return view('pages.phones', ['phones'=>$phones]);
            }else if(!empty($_GET['sort']) && !empty($_GET['phone_check_list'])  && $_GET['sort'] == 'descending'){
                $query=DB::table('phones')->join('price', 'phones.id', '=', 'price.phone_id')->select('phones.id', 'phones.img', 'phones.screen', 'phones.primary_camera', 'phones.secondary_camera', 'phones.os', 'phones.ram', 'phones.rom', 'phones.cpu', 'phones.gps', 'phones.wifi', 'phones.bluetooth', 'phones.battery', 'phones.weight', 'phones.name', 'phones.code_name',
                    'price.just_device', 'price.smart_s', 'price.smart_m', 'price.smart_l', 'price.magenta_s', 'price.magenta_m', 'price.magenta_l');
                foreach ($_GET['phone_check_list'] as $item){
                    $query->orWhere('code_name', $item);
                }
                $query->orderBy('just_device', 'desc');
                $phones=$query->get();
                return view('pages.phones', ['phones'=>$phones]);
            }else if(!empty($_GET['sort'])  && !empty($_GET['tarifa']) && $_GET['sort'] == 'ascending') {
                $phones=DB::table('phones')->join('price', 'phones.id', '=', 'price.phone_id')->select('phones.id', 'phones.img', 'phones.screen', 'phones.primary_camera', 'phones.secondary_camera', 'phones.os', 'phones.ram', 'phones.rom', 'phones.cpu', 'phones.gps', 'phones.wifi', 'phones.bluetooth', 'phones.battery', 'phones.weight', 'phones.name', 'phones.code_name',
                    'price.just_device', 'price.smart_s', 'price.smart_m', 'price.smart_l', 'price.magenta_s', 'price.magenta_m', 'price.magenta_l')->orderBy('just_device', 'asc')->get();
                $tarifa = $_GET['tarifa'];
                return view('pages.phones', ['phones'=>$phones, 'tarifa'=>$tarifa]);
            }else if(!empty($_GET['sort'])  && !empty($_GET['tarifa']) && $_GET['sort'] == 'descending') {
                $phones=DB::table('phones')->join('price', 'phones.id', '=', 'price.phone_id')->select('phones.id', 'phones.img', 'phones.screen', 'phones.primary_camera', 'phones.secondary_camera', 'phones.os', 'phones.ram', 'phones.rom', 'phones.cpu', 'phones.gps', 'phones.wifi', 'phones.bluetooth', 'phones.battery', 'phones.weight', 'phones.name', 'phones.code_name',
                    'price.just_device', 'price.smart_s', 'price.smart_m', 'price.smart_l', 'price.magenta_s', 'price.magenta_m', 'price.magenta_l')->orderBy('just_device', 'desc')->get();
                $tarifa = $_GET['tarifa'];
                return view('pages.phones', ['phones'=>$phones, 'tarifa'=>$tarifa]);
            }else if(!empty($_GET['phone_check_list']) && !empty($_GET['tarifa'])){
                $query=DB::table('phones')->join('price', 'phones.id', '=', 'price.phone_id')->select('phones.id', 'phones.img', 'phones.screen', 'phones.primary_camera', 'phones.secondary_camera', 'phones.os', 'phones.ram', 'phones.rom', 'phones.cpu', 'phones.gps', 'phones.wifi', 'phones.bluetooth', 'phones.battery', 'phones.weight', 'phones.name', 'phones.code_name',
                    'price.just_device', 'price.smart_s', 'price.smart_m', 'price.smart_l', 'price.magenta_s', 'price.magenta_m', 'price.magenta_l');
                foreach ($_GET['phone_check_list'] as $item){
                    $query->orWhere('code_name', $item);
                }
                $phones=$query->get();
                $tarifa = $_GET['tarifa'];
                return view('pages.phones', ['phones'=>$phones, 'tarifa'=>$tarifa]);
            }else if(!empty($_GET['sort']) && $_GET['sort'] == 'ascending'){
                $phones=DB::table('phones')->join('price', 'phones.id', '=', 'price.phone_id')->select('phones.id', 'phones.img', 'phones.screen', 'phones.primary_camera', 'phones.secondary_camera', 'phones.os', 'phones.ram', 'phones.rom', 'phones.cpu', 'phones.gps', 'phones.wifi', 'phones.bluetooth', 'phones.battery', 'phones.weight', 'phones.name', 'phones.code_name',
                    'price.just_device', 'price.smart_s', 'price.smart_m', 'price.smart_l', 'price.magenta_s', 'price.magenta_m', 'price.magenta_l')->orderBy('just_device', 'asc')->get();
                return view('pages.phones', ['phones'=>$phones]);
            }else if(!empty($_GET['sort']) && $_GET['sort'] == 'descending'){
                $phones=DB::table('phones')->join('price', 'phones.id', '=', 'price.phone_id')->select('phones.id', 'phones.img', 'phones.screen', 'phones.primary_camera', 'phones.secondary_camera', 'phones.os', 'phones.ram', 'phones.rom', 'phones.cpu', 'phones.gps', 'phones.wifi', 'phones.bluetooth', 'phones.battery', 'phones.weight', 'phones.name', 'phones.code_name',
                    'price.just_device', 'price.smart_s', 'price.smart_m', 'price.smart_l', 'price.magenta_s', 'price.magenta_m', 'price.magenta_l')->orderBy('just_device', 'desc')->get();
                return view('pages.phones', ['phones'=>$phones]);
            }else if(!empty($_GET['tarifa'])){
                $phones=DB::table('phones')->join('price', 'phones.id', '=', 'price.phone_id')->select('phones.id', 'phones.img', 'phones.screen', 'phones.primary_camera', 'phones.secondary_camera', 'phones.os', 'phones.ram', 'phones.rom', 'phones.cpu', 'phones.gps', 'phones.wifi', 'phones.bluetooth', 'phones.battery', 'phones.weight', 'phones.name', 'phones.code_name',
                    'price.just_device', 'price.smart_s', 'price.smart_m', 'price.smart_l', 'price.magenta_s', 'price.magenta_m', 'price.magenta_l')->get();
                $tarifa = $_GET['tarifa'];
                return view('pages.phones', ['phones'=>$phones, 'tarifa'=>$tarifa]);
            }else if(!empty($_GET['phone_check_list'])){
                $query=DB::table('phones')->join('price', 'phones.id', '=', 'price.phone_id')->select('phones.id', 'phones.img', 'phones.screen', 'phones.primary_camera', 'phones.secondary_camera', 'phones.os', 'phones.ram', 'phones.rom', 'phones.cpu', 'phones.gps', 'phones.wifi', 'phones.bluetooth', 'phones.battery', 'phones.weight', 'phones.name', 'phones.code_name',
                    'price.just_device', 'price.smart_s', 'price.smart_m', 'price.smart_l', 'price.magenta_s', 'price.magenta_m', 'price.magenta_l');
                foreach ($_GET['phone_check_list'] as $item){
                    $query->orWhere('code_name', $item);
                }
                $phones=$query->get();

                return view('pages.phones', ['phones'=>$phones]);
            }
        }
    }

    public function tablets(){
        if(empty($_GET)){
            $tablets=DB::table('tablets')->join('tabletsprices', 'tablets.id', '=', 'tabletsprices.tablet_id')->select('tablets.id', 'tablets.img', 'tablets.screen', 'tablets.primary_camera', 'tablets.secondary_camera', 'tablets.os', 'tablets.ram', 'tablets.rom', 'tablets.cpu', 'tablets.gps', 'tablets.wifi', 'tablets.bluetooth', 'tablets.battery', 'tablets.weight', 'tablets.name', 'tablets.code_name',
                'tabletsprices.just_device', 'tabletsprices.smart_s', 'tabletsprices.smart_m', 'tabletsprices.smart_l', 'tabletsprices.magenta_s', 'tabletsprices.magenta_m', 'tabletsprices.magenta_l')->get();
            return view('pages.tablets', ['tablets'=>$tablets]);
        }else{
            if(!empty($_GET['sort']) && !empty($_GET['tablet_check_list']) && !empty($_GET['tarifa']) && $_GET['sort'] == 'ascending'){
                $query=DB::table('tablets')->join('tabletsprices', 'tablets.id', '=', 'tabletsprices.tablet_id')->select('tablets.id', 'tablets.img', 'tablets.screen', 'tablets.primary_camera', 'tablets.secondary_camera', 'tablets.os', 'tablets.ram', 'tablets.rom', 'tablets.cpu', 'tablets.gps', 'tablets.wifi', 'tablets.bluetooth', 'tablets.battery', 'tablets.weight', 'tablets.name', 'tablets.code_name',
                    'tabletsprices.just_device', 'tabletsprices.smart_s', 'tabletsprices.smart_m', 'tabletsprices.smart_l', 'tabletsprices.magenta_s', 'tabletsprices.magenta_m', 'tabletsprices.magenta_l');
                foreach ($_GET['tablet_check_list'] as $item){
                    $query->orWhere('code_name', $item);
                }
                $query->orderBy('just_device', 'asc');
                $tablets=$query->get();
                $tarifa = $_GET['tarifa'];
                return view('pages.tablets', ['tablets'=>$tablets, 'tarifa'=>$tarifa]);
            }else if(!empty($_GET['sort']) && !empty($_GET['tablet_check_list']) && !empty($_GET['tarifa']) && $_GET['sort'] == 'descending'){
                $query=DB::table('tablets')->join('tabletsprices', 'tablets.id', '=', 'tabletsprices.tablet_id')->select('tablets.id', 'tablets.img', 'tablets.screen', 'tablets.primary_camera', 'tablets.secondary_camera', 'tablets.os', 'tablets.ram', 'tablets.rom', 'tablets.cpu', 'tablets.gps', 'tablets.wifi', 'tablets.bluetooth', 'tablets.battery', 'tablets.weight', 'tablets.name', 'tablets.code_name',
                    'tabletsprices.just_device', 'tabletsprices.smart_s', 'tabletsprices.smart_m', 'tabletsprices.smart_l', 'tabletsprices.magenta_s', 'tabletsprices.magenta_m', 'tabletsprices.magenta_l');
                foreach ($_GET['tablet_check_list'] as $item){
                    $query->orWhere('code_name', $item);
                }
                $query->orderBy('just_device', 'desc');
                $tablets=$query->get();
                $tarifa = $_GET['tarifa'];
                return view('pages.tablets', ['tablets'=>$tablets, 'tarifa'=>$tarifa]);
            }else if(!empty($_GET['sort']) && !empty($_GET['tablet_check_list'])  && $_GET['sort'] == 'ascending'){
                $query=DB::table('tablets')->join('tabletsprices', 'tablets.id', '=', 'tabletsprices.tablet_id')->select('tablets.id', 'tablets.img', 'tablets.screen', 'tablets.primary_camera', 'tablets.secondary_camera', 'tablets.os', 'tablets.ram', 'tablets.rom', 'tablets.cpu', 'tablets.gps', 'tablets.wifi', 'tablets.bluetooth', 'tablets.battery', 'tablets.weight', 'tablets.name', 'tablets.code_name',
                    'tabletsprices.just_device', 'tabletsprices.smart_s', 'tabletsprices.smart_m', 'tabletsprices.smart_l', 'tabletsprices.magenta_s', 'tabletsprices.magenta_m', 'tabletsprices.magenta_l');
                foreach ($_GET['tablet_check_list'] as $item){
                    $query->orWhere('code_name', $item);
                }
                $query->orderBy('just_device', 'asc');
                $tablets=$query->get();
                return view('pages.tablets', ['tablets'=>$tablets]);
            }else if(!empty($_GET['sort']) && !empty($_GET['tablet_check_list'])  && $_GET['sort'] == 'descending'){
                $query=DB::table('tablets')->join('tabletsprices', 'tablets.id', '=', 'tabletsprices.tablet_id')->select('tablets.id', 'tablets.img', 'tablets.screen', 'tablets.primary_camera', 'tablets.secondary_camera', 'tablets.os', 'tablets.ram', 'tablets.rom', 'tablets.cpu', 'tablets.gps', 'tablets.wifi', 'tablets.bluetooth', 'tablets.battery', 'tablets.weight', 'tablets.name', 'tablets.code_name',
                    'tabletsprices.just_device', 'tabletsprices.smart_s', 'tabletsprices.smart_m', 'tabletsprices.smart_l', 'tabletsprices.magenta_s', 'tabletsprices.magenta_m', 'tabletsprices.magenta_l');
                foreach ($_GET['tablet_check_list'] as $item){
                    $query->orWhere('code_name', $item);
                }
                $query->orderBy('just_device', 'desc');
                $tablets=$query->get();
                return view('pages.tablets', ['tablets'=>$tablets]);
            }else if(!empty($_GET['sort'])  && !empty($_GET['tarifa']) && $_GET['sort'] == 'ascending') {
                $tablets=DB::table('tablets')->join('tabletsprices', 'tablets.id', '=', 'tabletsprices.tablet_id')->select('tablets.id', 'tablets.img', 'tablets.screen', 'tablets.primary_camera', 'tablets.secondary_camera', 'tablets.os', 'tablets.ram', 'tablets.rom', 'tablets.cpu', 'tablets.gps', 'tablets.wifi', 'tablets.bluetooth', 'tablets.battery', 'tablets.weight', 'tablets.name', 'tablets.code_name',
                    'tabletsprices.just_device', 'tabletsprices.smart_s', 'tabletsprices.smart_m', 'tabletsprices.smart_l', 'tabletsprices.magenta_s', 'tabletsprices.magenta_m', 'tabletsprices.magenta_l')->orderBy('just_device', 'asc')->get();
                $tarifa = $_GET['tarifa'];
                return view('pages.tablets', ['tablets'=>$tablets, 'tarifa'=>$tarifa]);
            }else if(!empty($_GET['sort'])  && !empty($_GET['tarifa']) && $_GET['sort'] == 'descending') {
                $tablets=DB::table('tablets')->join('tabletsprices', 'tablets.id', '=', 'tabletsprices.tablet_id')->select('tablets.id', 'tablets.img', 'tablets.screen', 'tablets.primary_camera', 'tablets.secondary_camera', 'tablets.os', 'tablets.ram', 'tablets.rom', 'tablets.cpu', 'tablets.gps', 'tablets.wifi', 'tablets.bluetooth', 'tablets.battery', 'tablets.weight', 'tablets.name', 'tablets.code_name',
                    'tabletsprices.just_device', 'tabletsprices.smart_s', 'tabletsprices.smart_m', 'tabletsprices.smart_l', 'tabletsprices.magenta_s', 'tabletsprices.magenta_m', 'tabletsprices.magenta_l')->orderBy('just_device', 'desc')->get();
                $tarifa = $_GET['tarifa'];
                return view('pages.tablets', ['tablets'=>$tablets, 'tarifa'=>$tarifa]);
            }else if(!empty($_GET['tablet_check_list']) && !empty($_GET['tarifa'])){
                $query=DB::table('tablets')->join('tabletsprices', 'tablets.id', '=', 'tabletsprices.tablet_id')->select('tablets.id', 'tablets.img', 'tablets.screen', 'tablets.primary_camera', 'tablets.secondary_camera', 'tablets.os', 'tablets.ram', 'tablets.rom', 'tablets.cpu', 'tablets.gps', 'tablets.wifi', 'tablets.bluetooth', 'tablets.battery', 'tablets.weight', 'tablets.name', 'tablets.code_name',
                    'tabletsprices.just_device', 'tabletsprices.smart_s', 'tabletsprices.smart_m', 'tabletsprices.smart_l', 'tabletsprices.magenta_s', 'tabletsprices.magenta_m', 'tabletsprices.magenta_l');
                foreach ($_GET['tablet_check_list'] as $item){
                    $query->orWhere('code_name', $item);
                }
                $tablets=$query->get();
                $tarifa = $_GET['tarifa'];
                return view('pages.tablets', ['tablets'=>$tablets, 'tarifa'=>$tarifa]);
            }else if(!empty($_GET['sort']) && $_GET['sort'] == 'ascending'){
                $tablets=DB::table('tablets')->join('tabletsprices', 'tablets.id', '=', 'tabletsprices.tablet_id')->select('tablets.id', 'tablets.img', 'tablets.screen', 'tablets.primary_camera', 'tablets.secondary_camera', 'tablets.os', 'tablets.ram', 'tablets.rom', 'tablets.cpu', 'tablets.gps', 'tablets.wifi', 'tablets.bluetooth', 'tablets.battery', 'tablets.weight', 'tablets.name', 'tablets.code_name',
                    'tabletsprices.just_device', 'tabletsprices.smart_s', 'tabletsprices.smart_m', 'tabletsprices.smart_l', 'tabletsprices.magenta_s', 'tabletsprices.magenta_m', 'tabletsprices.magenta_l')->orderBy('just_device', 'asc')->get();
                return view('pages.tablets', ['tablets'=>$tablets]);
            }else if(!empty($_GET['sort']) && $_GET['sort'] == 'descending'){
                $tablets=DB::table('tablets')->join('tabletsprices', 'tablets.id', '=', 'tabletsprices.tablet_id')->select('tablets.id', 'tablets.img', 'tablets.screen', 'tablets.primary_camera', 'tablets.secondary_camera', 'tablets.os', 'tablets.ram', 'tablets.rom', 'tablets.cpu', 'tablets.gps', 'tablets.wifi', 'tablets.bluetooth', 'tablets.battery', 'tablets.weight', 'tablets.name', 'tablets.code_name',
                    'tabletsprices.just_device', 'tabletsprices.smart_s', 'tabletsprices.smart_m', 'tabletsprices.smart_l', 'tabletsprices.magenta_s', 'tabletsprices.magenta_m', 'tabletsprices.magenta_l')->orderBy('just_device', 'desc')->get();
                return view('pages.tablets', ['tablets'=>$tablets]);
            }else if(!empty($_GET['tarifa'])){
                $tablets=DB::table('tablets')->join('tabletsprices', 'tablets.id', '=', 'tabletsprices.tablet_id')->select('tablets.id', 'tablets.img', 'tablets.screen', 'tablets.primary_camera', 'tablets.secondary_camera', 'tablets.os', 'tablets.ram', 'tablets.rom', 'tablets.cpu', 'tablets.gps', 'tablets.wifi', 'tablets.bluetooth', 'tablets.battery', 'tablets.weight', 'tablets.name', 'tablets.code_name',
                    'tabletsprices.just_device', 'tabletsprices.smart_s', 'tabletsprices.smart_m', 'tabletsprices.smart_l', 'tabletsprices.magenta_s', 'tabletsprices.magenta_m', 'tabletsprices.magenta_l')->get();
                $tarifa = $_GET['tarifa'];
                return view('pages.tablets', ['tablets'=>$tablets, 'tarifa'=>$tarifa]);
            }else if(!empty($_GET['tablet_check_list'])){
                echo "HELLO";
                $query=DB::table('tablets')->join('tabletsprices', 'tablets.id', '=', 'tabletsprices.tablet_id')->select('tablets.id', 'tablets.img', 'tablets.screen', 'tablets.primary_camera', 'tablets.secondary_camera', 'tablets.os', 'tablets.ram', 'tablets.rom', 'tablets.cpu', 'tablets.gps', 'tablets.wifi', 'tablets.bluetooth', 'tablets.battery', 'tablets.weight', 'tablets.name', 'tablets.code_name',
                    'tabletsprices.just_device', 'tabletsprices.smart_s', 'tabletsprices.smart_m', 'tabletsprices.smart_l', 'tabletsprices.magenta_s', 'tabletsprices.magenta_m', 'tabletsprices.magenta_l');
                foreach ($_GET['tablet_check_list'] as $item){
                    $query->orWhere('code_name', $item);
                }
                $tablets=$query->get();
                return view('pages.tablets', ['tablets'=>$tablets]);
            }
        }
    }

    public function laptops(){
        if(empty($_GET)){
            $laptops=DB::table('laptops')->get();
            return view('pages.laptops', ['laptops'=>$laptops]);
        }else{
            if(!empty($_GET['sort']) && $_GET['sort'] == 'ascending' && !empty($_GET['laptop_check_list'])){
                $query=DB::table('laptops');
                foreach ($_GET['laptop_check_list'] as $item){
                    $query->orWhere('code', $item);
                }
                $query->orderBy('price', 'asc');
                $laptops=$query->get();
                return view('pages.laptops', ['laptops'=>$laptops]);
            }else if(!empty($_GET['sort']) && $_GET['sort'] == 'descending' && !empty($_GET['laptop_check_list'])){
                $query=DB::table('laptops');
                foreach ($_GET['laptop_check_list'] as $item){
                    $query->orWhere('code', $item);
                }
                $query->orderBy('price', 'desc');
                $laptops=$query->get();
                return view('pages.laptops', ['laptops'=>$laptops]);
            }else if(!empty($_GET['sort']) && $_GET['sort'] == 'ascending'){
                $laptops=DB::table('laptops')->orderBy('price', 'asc')->get();
                return view('pages.laptops', ['laptops'=>$laptops]);
            }else if(!empty($_GET['sort']) && $_GET['sort'] == 'descending'){
                $laptops=DB::table('laptops')->orderBy('price', 'desc')->get();
                return view('pages.laptops', ['laptops'=>$laptops]);
            }else if(!empty($_GET['laptop_check_list'])){
                $query=DB::table('laptops');
                foreach ($_GET['laptop_check_list'] as $item){
                    $query->orWhere('code', $item);
                }
                $laptops=$query->get();
                return view('pages.laptops', ['laptops'=>$laptops]);
            }
        }
    }
}