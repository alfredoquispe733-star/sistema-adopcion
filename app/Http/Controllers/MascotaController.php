<?php
namespace App\Http\Controllers;
use App\Http\Requests\MascotaRequest;
use App\Models\Mascota;
use Illuminate\Support\Facades\Storage;
class MascotaController extends Controller
{
    public function index()
    {
        return view('mascotas.index', ['mascotas' => Mascota::latest()->paginate(50)]);
    }
    public function create()
    {
        return view('mascotas.create');
    }
    public function store(MascotaRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('imagen')) {
            $data['fotografia'] = $request->file('imagen')->store('mascotas', 'public');
        }
        Mascota::create($data);
        return redirect()->route('mascotas.index')->with('success', 'Mascota creada correctamente.');
    }
    public function show(Mascota $mascota)
    {
        return view('mascotas.show', compact('mascota'));
    }
    public function edit(Mascota $mascota)
    {
        return view('mascotas.edit', compact('mascota'));
    }
    public function update(MascotaRequest $request, Mascota $mascota)
    {
        $data = $request->validated();
        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($mascota->fotografia && Storage::disk('public')->exists($mascota->fotografia)) {
                Storage::disk('public')->delete($mascota->fotografia);
            }
            $data['fotografia'] = $request->file('imagen')->store('mascotas', 'public');
        } else {
            unset($data['fotografia']);
        }
        $mascota->update($data);
        return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada correctamente.');
    }
    public function destroy(Mascota $mascota)
    {
        if ($mascota->fotografia && Storage::disk('public')->exists($mascota->fotografia)) {
            Storage::disk('public')->delete($mascota->fotografia);
        }
        $mascota->delete();
        return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada correctamente.');
    }
}
