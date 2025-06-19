<div>
    <h2>Redirects</h2>
    <table>
        <thead><tr><th>Old URL</th><th>New URL</th><th>Code</th></tr></thead>
        <tbody>
            @foreach($redirects as $redirect)
                <tr>
                    <td>{{ $redirect->old_url }}</td>
                    <td>{{ $redirect->new_url }}</td>
                    <td>{{ $redirect->status_code }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
