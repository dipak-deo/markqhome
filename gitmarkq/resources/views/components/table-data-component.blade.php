<div>
    @props(['metadata'])
    <div class="col-md-12 {{ $metadata['div_class'] }}">
        <div class="form-group">
            <label for="" class="col-form-label form-label">{{ $metadata['label'] }}</label>
        </div>
        <table class="table table-bordered {{ $metadata['table_class'] }}">
            <thead>
                <th>SN</th>
                <th>Meta Key</th>
                <th>Meta Value</th>
                <th><button type="button" class="btn btn-warning btn-add">+</button></th>
            </thead>
            <tbody>
                @if(isset($metadata['datas']))
                @foreach($metadata['datas'] as $key=>$value)
                <tr>
                    <td class="sn">1</td>
                    <td>
                        <div class="form-group">
                        <input type="text" class="form-control" name="{{ $metadata['meta_key'] }}[]" value="{{$key}}">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                        <input type="text" class="form-control" name="{{ $metadata['meta_value'] }}[]" value="{{ $value }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <button type="button" class="btn btn-danger btn-remove">-</button>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else 
                <tr>
                    <td class="sn">1</td>
                    <td>
                        <div class="form-group">
                        <input type="text" class="form-control" name="{{ $metadata['meta_key'] }}[]" placeholder="eg: length">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                        <input type="text" class="form-control" name="{{ $metadata['meta_value'] }}[]" placeholder="eg: 30ft">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <button type="button" class="btn btn-danger btn-remove">-</button>
                        </div>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
