<div>
    <select name="uf_id" id="uf_id">
        @foreach ($ufs as $uf)
            <option value="{{ $uf->id }}">{{ $uf->nome }}</option>
        @endforeach
    </select>
</div>
