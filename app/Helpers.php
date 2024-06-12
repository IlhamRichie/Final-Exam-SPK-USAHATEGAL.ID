<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

function is_hidden($action)
{
    return is_able($action) ? '' : 'hidden';
}

function is_able($action)
{
    $role = [
        'admin' => [
            'home',
            'user.index', 'user.create', 'user.store', 'user.edit', 'user.update', 'user.destroy',
            'user.password', 'user.password.update', 'user.logout', 'user.profil', 'user.profil.update',
            'kriteria.index', 'kriteria.create', 'kriteria.store', 'kriteria.edit', 'kriteria.update', 'kriteria.destroy',
            'crisp.index', 'crisp.cetak', 'crisp.create', 'crisp.store', 'crisp.edit', 'crisp.update', 'crisp.destroy',
            'alternatif.index', 'alternatif.create', 'alternatif.store', 'alternatif.edit', 'alternatif.update', 'alternatif.destroy', 'alternatif.cetak',
            'rel_alternatif.index', 'rel_alternatif.edit', 'rel_alternatif.update',
            'hitung.index', 'hitung.cetak',
        ],
        'user' => [
            'home',
            'user.password', 'user.password.update', 'user.logout', 'user.profil', 'user.profil.update',
            // 'user.index', 'user.create', 'user.store', 'user.edit', 'user.update', 'user.destroy',
            'kriteria.index', 'kriteria.cetak', //'kriteria.create', 'kriteria.store', 'kriteria.edit', 'kriteria.update', 'kriteria.destroy',
            'crisp.index', 'crisp.cetak', //'crisp.create', 'crisp.store', 'crisp.edit', 'crisp.update', 'crisp.destroy',
            'alternatif.index', 'alternatif.cetak', //'alternatif.create', 'alternatif.store', 'alternatif.edit', 'alternatif.update', 'alternatif.destroy',
            'rel_alternatif.index', 'rel_alternatif.cetak', //'rel_alternatif.edit', 'rel_alternatif.update',
            'hitung.index', 'hitung.cetak',
        ],
    ];
    $user = Auth::user();
    if ($user) {
        if (in_array($user->level, array_keys($role))) {
            return in_array($action, $role[$user->level]);
        }
    }
}

function is_admin()
{
    return Auth::user()->level == 'admin';
}

function is_user()
{
    return Auth::user()->level == 'user';
}

function format_date($data, $format = 'd-M-Y')
{
    return date($format, strtotime($data));
}

function get_kriteria_option($selected = '')
{
    $rows = get_results("SELECT * FROM tb_kriteria ORDER BY kode_kriteria");
    $a = '';
    foreach ($rows as $row) {
        if ($row->kode_kriteria == $selected)
            $a .= '<option value="' . $row->kode_kriteria . '" selected>' . $row->nama_kriteria . '</option>';
        else
            $a .= '<option value="' . $row->kode_kriteria . '">' . $row->nama_kriteria . '</option>';
    }
    return $a;
}

function get_image_url($file)
{

    if (File::exists($file) && File::isFile($file))
        return asset($file);
    else
        return asset('images/no_image.png');
}
function current_user()
{
    return User::find(Auth::id());
}

function get_atribut_option($selected = '')
{
    $arr = [
        'benefit' => 'Benefit',
        'cost' => 'Cost'
    ];
    $a = '';
    foreach ($arr as $key => $value) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>$value</option>";
        else
            $a .= "<option value='$key'>$value</option>";
    }
    return $a;
}

function get_level_option($selected = '')
{
    $arr = [
        'admin' => 'Admin',
        'user' => 'User'
    ];
    $a = '';
    foreach ($arr as $key => $value) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>$value</option>";
        else
            $a .= "<option value='$key'>$value</option>";
    }
    return $a;
}

function get_status_user_option($selected = '')
{
    $arr = [
        1 => 'Aktif',
        0 => 'NonAktif'
    ];
    $a = '';
    foreach ($arr as $key => $value) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>$value</option>";
        else
            $a .= "<option value='$key'>$value</option>";
    }
    return $a;
}

function print_msg($msg, $type = 'danger')
{
    echo ('<div class="alert alert-' . $type . ' alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $msg . '</div>');
}

function show_error($errors)
{
    if ($errors->any()) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><ul class="m-0 pl-3">';
        foreach ($errors->all() as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>';
    }
}
function show_msg()
{
    if ($messsage = session()->get('message')) {
        echo '<div class="alert alert-info alert-dismissible fade show" role="alert">'
            . $messsage . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }
}

function rp($number)
{
    return 'Rp ' . number_format($number);
}

function kode_oto($field, $table, $prefix, $length)
{
    $var = get_var("SELECT $field FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");
    if ($var) {
        return $prefix . substr(str_repeat('0', $length) . ((int)substr($var, -$length) + 1), -$length);
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}

function get_row($sql = '')
{
    $rows =  DB::select($sql);
    if ($rows)
        return $rows[0];
}

function get_results($sql = '')
{
    return DB::select($sql);
}

function get_var($sql = '')
{
    $row = DB::select($sql);
    if ($row) {
        return current(current($row));
    }
}

function query($sql, $params = [])
{
    return DB::statement($sql, $params);
}

function get_kriteria()
{
    $rows = get_results("SELECT * FROM tb_kriteria ORDER BY kode_kriteria");
    $arr = array();
    foreach ($rows as $row) {
        $arr[$row->kode_kriteria] = $row;
    }
    return $arr;
}

function get_alternatif()
{
    $rows = get_results("SELECT * FROM tb_alternatif ORDER BY kode_alternatif");
    $arr = array();
    foreach ($rows as $row) {
        $arr[$row->kode_alternatif] = $row;
    }
    return $arr;
}

function get_crisp()
{
    $rows = get_results("SELECT * FROM tb_crisp ORDER BY kode_kriteria, nilai");
    $arr = array();
    foreach ($rows as $row) {
        $arr[$row->id_crisp] = $row;
    }
    return $arr;
}

function get_rel_alternatif()
{
    $rows = get_results("SELECT * FROM tb_rel_alternatif ORDER BY kode_alternatif, kode_kriteria");
    $arr = array();
    foreach ($rows as $row) {
        $arr[$row->kode_alternatif][$row->kode_kriteria] = $row->id_crisp;
    }
    return $arr;
}

function get_crisp_option($kode_kriteria, $selected = '')
{
    $arr = get_crisp();
    $a = '';
    foreach ($arr as $key => $val) {
        if ($val->kode_kriteria == $kode_kriteria) {
            if ($key == $selected)
                $a .= '<option value="' . $key . '" selected>' . $val->nama_crisp . '</option>';
            else
                $a .= '<option value="' . $key . '">' . $val->nama_crisp . '</option>';
        }
    }
    return $a;
}


function get_pencarian_option($arrfilter)
{
	 
   $jumlah=sizeof($arrfilter);  
    $a = '';
	
	$rows = get_results("SELECT * FROM tb_kriteria ORDER BY kode_kriteria");
    $arr = array();
	 $x=0;
    foreach ($rows as $row) {
        $kode = $row->kode_kriteria;
		$a.="<div class='col-md-2' style='margin:5px;'>
			<div class='form-group row'>
						<label>".$row->nama_kriteria."</label>";
						
		$a.="<select name='kriteria$kode' class='form-select select2'>";
		$a.="<option value='' selected> </option>"; 
		$caricrisp = get_results("SELECT * FROM tb_crisp WHERE kode_kriteria='".$kode."' ORDER BY nilai ASC"); 
		
		 
		foreach ($caricrisp as $crisp) {
			$idcrisp = $crisp->id_crisp;
			if($arrfilter[$x]==$idcrisp) {
				$a.="<option value='".$crisp->id_crisp."' selected>".$crisp->nama_crisp."</option>";
			} else {
				$a.="<option value='".$crisp->id_crisp."'>".$crisp->nama_crisp."</option>";
			}
			
			
		}
			$x++; 
		$a.="</select>
		</div>
		</div>";
    }
	
	
   
    return $a;
}


function get_crisp_by_AK($kodealternatif, $kodekriteria)
{
    $rows = get_results("SELECT * FROM tb_rel_alternatif WHERE kode_alternatif='$kodealternatif' AND kode_kriteria='$kodekriteria'");
    $arr = array();
    foreach ($rows as $row) {
         $id = $row->id_crisp;
    }
    return $id;
}


