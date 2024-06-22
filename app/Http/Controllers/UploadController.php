<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class UploadController extends Controller
{
	public function upload(){
		return view('upload');
	}
 
	public function upload_process(Request $request){
		$this->validate($request, [
			'file' => 'required'
		]);

		$file = $request->file('file');
		$file_destination = 'public/items';
		$file->move($file_destination,$file->getClientOriginalName());
	}
}