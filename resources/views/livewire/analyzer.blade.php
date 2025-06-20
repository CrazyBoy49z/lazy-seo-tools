<div class="space-y-2">
    <div class="text-sm">SEO Score: 
        <span 
            class="px-2 py-1 rounded text-white"
            style="background-color: {{ 
                $result['grade'] === 'green' ? '#16a34a' : (
                    $result['grade'] === 'orange' ? '#f59e0b' : '#dc2626'
                ) 
            }}"
        >
            {{ $result['score'] }} / 50
        </span>
    </div>

    @if (count($result['warnings']))
        <ul class="list-disc pl-5 text-sm text-gray-500">
            @foreach($result['warnings'] as $warning)
                <li>{{ $warning }}</li>
            @endforeach
        </ul>
    @else
        <p class="text-green-500 text-sm">Все ок ✅</p>
    @endif
</div>
