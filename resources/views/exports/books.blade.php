
<table>
    <thead>
    <tr >
        <th style="
            width: 40px; 
            background-color: #DDD9C4;
            border-bottom: 2px solid #1f1f1f;
            font-weight: bold;
            ">
            Judul Buku
        </th>
        <th style="
            width: 30px; 
            background-color: #DDD9C4;
            border-bottom: 2px solid #1f1f1f;
            font-weight: bold;
            ">
            Penulis
        </th>
        <th style="
            width: 30px; 
            background-color: #DDD9C4;
            border-bottom: 2px solid #1f1f1f;
            font-weight: bold;
            ">
            Penerbit
        </th>
        <th style="
            width: 30px; 
            background-color: #DDD9C4;
            border-bottom: 2px solid #1f1f1f;
            font-weight: bold;
            ">
            Lower
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($books as $row)
        <tr>
            <td style="
            border: none;
            ">{{ $row->judul_buku }}</td>
            <td style="
            border: none;
            ">{{ $row->penulis }}</td>
            <td style="
            border: none;
            ">{{ $row->penerbit }}</td>
            <td style="
            border: none;
            ">{{ $row->lower }}</td>
        </tr>
    @endforeach
    </tbody>

</table>