<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\MasterData\ImageMaster;
use App\Models\MasterData\StatusMaster;
use App\Models\MasterData\categoryMaster;
use Datatables;
use DB;
use Alert;

class ImageMasterController extends Controller
{
    
    public function index(){
        return view('masterdata.imagemasters.index');
    }

    public function getdata(){
        
        if(request()->ajax()) {


            $query = " SELECT a.*, b.name as product_name, c.name as status_name, d.name as category_name
                        FROM image_masters a
                        LEFT JOIN products b ON a.product_id = b.product_id
                        LEFT JOIN status_masters c ON a.status_id = c.status_id
                        LEFT JOIN category_masters d ON a.category_id = d.category_master_id
                    ";

            $users = DB::connection('mysql')->select($query);
            // dd($users);

            return datatables()->of($users)
            ->addColumn('action', 'imagemasters.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

    }

    public function create()
    {
        $data['products'] = Product::select('product_id', 'name')->get();
        $data['images'] = ImageMaster::select('image_master_id', 'name')->get();
        $data['status'] = StatusMaster::select('status_id', 'name')->whereIn('status_id', [1, 2])->get();
        $data['categories'] = CategoryMaster::select('category_master_id', 'name')->get();

        return view('masterdata.imagemasters.create', compact('data'));
    }

    public function action()
    {
        return view('masterdata.imagemasters.action');
    }

    public function store(Request $request)
    {
        $randomId = null;

        while (!$randomId || ImageMaster::where('product_id', $randomId)->exists()) {
            $randomId = rand(1, 1000); // Adjust range based on your table size
        }

        $image = $request->file('image');
        $image->storeAs('public/images', $image->hashName());

        $imagemaster = ImageMaster::create([
            'image_master_id'     => $randomId,
            'product_id'     => $request->product_id,
            'status_id'     => $request->status_id,
            'category_id'     => $request->category_id,
            'name'     => $request->name,
            'image'     => $image->hashName(),
            'description'   => '',
            'table_name'   => 'image_masters',
            'lang'   => '',
            'lang_id'   => ''
        ]);

        // Alert::success('Hore!', 'Image Created Successfully');
        // return redirect()->route('imagemasters.index');

        return redirect()->route('imagemasters.index')
        ->with('success','Image has been created successfully.');
    }

    public function show(RoleMaster $imagemaster)
    {
        return view('masterdata.imagemasters.show',compact('imagemaster'));
    } 


    public function edit(RoleMaster $imagemaster)
    {
        return view('masterdata.imagemasters.edit',compact('imagemaster'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'roles_id' => 'required',
            'status_id' => 'required',
            'name' => 'required',
            'lang' => 'required',
            'lang_id' => 'required'
        ]);
        
        $imagemaster = ImageMaster::find($id);

        $imagemaster->roles_id = $request->roles_id;
        $imagemaster->status_id = $request->status_id;
        $imagemaster->name = $request->name;
        $imagemaster->lang = $request->lang;
        $imagemaster->lang_id = $request->lang_id;

        $imagemaster->save();
    
        return redirect()->route('imagemasters.index')
                        ->with('success','Role Has Been updated successfully');
    }

    public function destroy(Request $request)
    {
        $imagemaster = ImageMaster::where('id',$request->id)->delete();
     
        return Response()->json($imagemaster);
    }

}
