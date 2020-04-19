<p class="mt-8 text-center text-xs text-80">
    <a href="{{ Setting::get('admin.url') ?? config('nova_setting.admin.url') }}" class="text-primary dim no-underline">
        {{ Setting::get('admin.name') ?? config('nova_setting.admin.name') }}
    </a>
    <span class="px-1">&middot;</span>
    &copy; {{ Setting::get('admin.copyright.year') ?? date('Y') }}
    {{ Setting::get('admin.copyright.owner') ?? config('nova_setting.admin.copyright.owner') }}
    <span class="px-1">&middot;</span>
    {{ Setting::get('admin.copyright.text') ?? config('nova_setting.admin.copyright.text') }}
    <span class="px-1">&middot;</span>
    {{ Setting::get('admin.version') ?? config('nova_setting.admin.version') }}
</p>

