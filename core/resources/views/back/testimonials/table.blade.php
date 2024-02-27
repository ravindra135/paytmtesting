@foreach($datas as $data)
    <tr>
        <td>
            {{ $data->name }}
        </td>
        <td>
                        {{ $data->post }}

        </td>
       
        <td>
            <div class="action-list">
                <a class="btn btn-secondary btn-sm btn-rounded"
                    href="{{ route('back.testimonials.edit',[$data->id]) }}">
                    <i class="fas fa-edit"></i> {{ __('Edit') }}
                </a>
               
            </div>
        </td>
    </tr>
@endforeach
