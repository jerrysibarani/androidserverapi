<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KaryawanModel;

class ApiController extends Controller
{

    public function get_all_karyawan()
	{
		 // return response()->json(KaryawanModel::all(), 200);
		return response()->json(KaryawanModel::paginate(5), 200); // ->paginate(5)
		
	}

	 public function insert_data_karyawan(Request $request)
	{
		$insert_karyawan 		 = new KaryawanModel;
		$insert_karyawan->nama   = $request-> namaKaryawan;
		$insert_karyawan->alamat = $request-> alamatKaryawan;
		$insert_karyawan->save();

		return response([
				'status' => 'Succeed',
				'message'=> 'Karyawan saved!',
				'data'=> $insert_karyawan],200);		
		
	}

	 public function update_data_karyawan(Request $request)
	{
		$check_karyawan = KaryawanModel::firstWhere('id', $request-> id);
		if($check_karyawan){
			$data_karyawan 		   = KaryawanModel::find($request-> id);
			$data_karyawan->nama   = $request-> namaKaryawan;
			$data_karyawan->alamat = $request-> alamatKaryawan;
			$data_karyawan->save();
			return response([
				'status'      => 'Succeed',
				'message'     => 'Record Updated Succesfully!',
				'data'        => $data_karyawan],200);
		}		
		else{
				$data_karyawan 		   = KaryawanModel::find($request-> id);
				return response([
					'status'      => 'Failed',
					'message'     => 'Please check your input!',
					'data'        => $data_karyawan],200);
		}
	}

 	public function delete_data_karyawan(Request $request)
	{
		$check_karyawan = KaryawanModel::firstWhere('id', $request-> id);
		if($check_karyawan){
			KaryawanModel::destroy($request-> id);
			return response([
				'status'		=> 'Succeed',
				'message'		=> 'Record Deleted Succesfully!',
				'data'			=> $check_karyawan],200);
		} else {			
			return response([
				'status'		=> 'Failed Deleting..!',
				'message'		=> 'Please check your input!',
				'data'			=> $check_karyawan],200);
		}
	}


}