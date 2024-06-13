<select name="rodovia_id" id="rodovia_id">
    @foreach ($rodovias as $rodovia)
        <option value="{{ $rodovia->id }}">{{ $rodovia->nome }}</option>
    @endforeach
</select>
