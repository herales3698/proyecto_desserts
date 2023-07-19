<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();

        $categorias = Categoria::pluck('nombre','id');

        return view('producto.create', compact('producto','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'categoria_id' => 'required',
                'nombre' => 'required',
                'descripcion' => 'required',
                'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'precio' => 'required',
                'stock' => 'required',
            ]);
        
            $producto = new Producto();
            $producto->categoria_id = $request->categoria_id;
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->precio = $request->precio;
            $producto->stock = $request->stock;
        
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
                $imagen->move('storage/imagenes', $nombreImagen);
                $producto->imagen = $nombreImagen;
            }
        
            $producto->save();
        
            return redirect()->route('productos.index')
                ->with('success', 'Producto creado exitosamente.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        
        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        $categorias = Categoria::pluck('nombre','id');

        return view('producto.edit', compact('producto','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'categoria_id' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'precio' => 'required',
            'stock' => 'required',
        ]);

        $producto->categoria_id = $request->categoria_id;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($producto->imagen) {
                $imagenAnterior = 'storage/imagenes/' . $producto->imagen;
                if (File::exists($imagenAnterior)) {
                    File::delete($imagenAnterior);
                }
            }

            // Guardar la nueva imagen
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move('storage/imagenes', $nombreImagen);
            $producto->imagen = $nombreImagen;
        }

        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);

        // Eliminar la imagen si existe
        if ($producto->imagen) {
            $imagen = 'storage/imagenes/' . $producto->imagen;
            if (File::exists($imagen)) {
                File::delete($imagen);
            }
        }

        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado con éxito');
    }
}
