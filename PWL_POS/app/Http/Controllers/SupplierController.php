<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\SupplierModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Supplier',
            'list' => ['Home', 'Supplier']
        ];

        $page = (object) [
            'title' => 'Daftar Supplier yang terdaftar di sistem'
        ];

        $activeMenu = 'supplier';
        $supplier = SupplierModel::all();

        return view('supplier.index', compact('breadcrumb', 'page', 'activeMenu', 'supplier'));
    }

    public function list(Request $request)
    {
        $supplier = SupplierModel::select('supplier_id', 'supplier_kode', 'supplier_nama', 'supplier_kontak', 'supplier_alamat');

        if ($request->supplier_nama) {
            $supplier->where('supplier_nama', 'like', '%' . $request->supplier_nama . '%');
        }

        return DataTables::of($supplier)
            ->addIndexColumn()
            ->addColumn('aksi', function ($supplier) {
                //  $btn = '<a href="' . url('/supplier/' . $supplier->supplier_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                //  $btn .= '<a href="' . url('/supplier/' . $supplier->supplier_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                //  $btn .= '<form class="d-inline-block" method="POST" action="' . url('/supplier/' . $supplier->supplier_id) . '">'
                //      . csrf_field() . method_field('DELETE') .
                //      '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                $btn = '<button onclick="modalAction(\'' . url('/supplier/' . $supplier->supplier_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/supplier/' . $supplier->supplier_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/supplier/' . $supplier->supplier_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah supplier',
            'list' => ['Home', 'supplier', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Supplier Baru'
        ];

        $activeMenu = 'supplier';
        $supplier = SupplierModel::all();

        return view('supplier.create', compact('breadcrumb', 'page', 'activeMenu', 'supplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_kode'   => 'required|string|max:10|unique:m_supplier,supplier_kode',
            'supplier_nama'   => 'required|string|max:100',
            'supplier_alamat' => 'required|string',
            'supplier_kontak' => 'required|string|max:15|unique:m_supplier,supplier_kontak'
        ]);

        SupplierModel::create([
            'supplier_kode'   => $request->supplier_kode,
            'supplier_nama'   => $request->supplier_nama,
            'supplier_alamat' => $request->supplier_alamat,
            'supplier_kontak' => $request->supplier_kontak
        ]);

        return redirect('/supplier')->with('success', 'Data supplier berhasil disimpan');
    }

    public function show($id)
    {
        $supplier = SupplierModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail supplier',
            'list' => ['Home', 'supplier', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Supplier',
        ];

        $activeMenu = 'supplier';

        return view('supplier.show', compact('breadcrumb', 'page', 'supplier', 'activeMenu'));
    }

    public function edit($id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit supplier',
            'list' => ['Home', 'supplier', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Supplier'
        ];

        $activeMenu = 'supplier';
        $supplier = SupplierModel::findOrFail($id);

        return view('supplier.edit', compact('breadcrumb', 'page', 'activeMenu', 'supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_nama'   => 'required|string|max:100',
            'supplier_alamat' => 'required|string',
            'supplier_kontak' => 'required|string|max:15|unique:m_supplier,supplier_kontak,' . $id . ',supplier_id',
        ]);

        SupplierModel::findOrFail($id)->update($request->all());

        return redirect('/supplier')->with('success', 'Data supplier berhasil diubah!');
    }

    public function destroy($id)
    {
        $check = SupplierModel::find($id);
        if (!$check) {
            return redirect('/supplier')->with('error', 'Data supplier tidak ditemukan');
        }

        try {
            SupplierModel::destroy($id);
            return redirect('/supplier')->with('success', 'Data supplier berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/supplier')->with('error', 'Data supplier gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    public function create_ajax()
    {
        return view('supplier.create_ajax');
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'supplier_kode' => 'required|unique:m_supplier',
                'supplier_nama' => 'required',
                'supplier_kontak' => 'required',
                'supplier_alamat' => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            SupplierModel::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data Supplier berhasil disimpan'
            ]);
        }
        redirect('/');
    }
    public function show_ajax(string $id)
    {
        $supplier = SupplierModel::find($id);
        return view('supplier.show_ajax', ['supplier' => $supplier]);
    }

    public function edit_ajax($id)
    {
        $supplier = SupplierModel::find($id);

        return view('supplier.edit_ajax', ['supplier' => $supplier]);
    }

    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'supplier_kode' => 'required|unique:m_supplier,supplier_kode,' . $id . ',supplier_id',
                'supplier_nama' => 'required',
                'supplier_kontak' => 'required',
                'supplier_alamat' => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            SupplierModel::find($id)->update($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data Supplier berhasil diubah'
            ]);
        }
        redirect('/');
    }

    public function confirm_ajax($id)
    {
        $supplier = SupplierModel::find($id);

        return view('supplier.confirm_ajax', ['supplier' => $supplier]);
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            try {
                $check = SupplierModel::find($id);
                if ($check) {
                    $check->delete();
                    return response()->json([
                        'status' => true,
                        'message' => 'Data berhasil dihapus'
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Data tidak ditemukan'
                    ]);
                }
            } catch (\Exception $e) {
                Log::error('Error deleting user: ' . $e->getMessage());
                if (str_contains($e->getMessage(), 'SQLSTATE[23000]')) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Data tidak dapat dihapus karena masih terkait dengan data lain di sistem'
                    ]);
                }
            }
        }
        return redirect('/');
    }
}