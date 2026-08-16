@php($iconName = $name ?? 'circle')
<svg class="admin-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    @if($iconName === 'dashboard')
        <rect x="3" y="3" width="7" height="7" rx="1"></rect><rect x="14" y="3" width="7" height="7" rx="1"></rect><rect x="3" y="14" width="7" height="7" rx="1"></rect><rect x="14" y="14" width="7" height="7" rx="1"></rect>
    @elseif($iconName === 'categories')
        <path d="M4 5.5h6l2 2H20v11H4z"></path><path d="M4 9h16"></path>
    @elseif($iconName === 'products')
        <path d="M5 7.5 12 4l7 3.5v9L12 20l-7-3.5z"></path><path d="M5 7.5 12 11l7-3.5"></path><path d="M12 11v9"></path>
    @elseif($iconName === 'pages')
        <path d="M6 3h9l4 4v14H6z"></path><path d="M15 3v5h4"></path><path d="M9 12h7M9 16h7"></path>
    @elseif($iconName === 'media')
        <rect x="3" y="4" width="18" height="16" rx="2"></rect><circle cx="9" cy="10" r="2"></circle><path d="m5 18 5-5 3 3 2-2 4 4"></path>
    @elseif($iconName === 'messages')
        <path d="M4 5h16v12H8l-4 4z"></path><path d="M8 9h8M8 13h5"></path>
    @elseif($iconName === 'settings')
        <circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1-2.8 2.8-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.5V21h-4v-.1a1.7 1.7 0 0 0-1-1.5 1.7 1.7 0 0 0-1.9.3l-.1.1L4.2 17l.1-.1a1.7 1.7 0 0 0 .3-1.9 1.7 1.7 0 0 0-1.5-1H3v-4h.1a1.7 1.7 0 0 0 1.5-1 1.7 1.7 0 0 0-.3-1.9L4.2 7 7 4.2l.1.1a1.7 1.7 0 0 0 1.9.3 1.7 1.7 0 0 0 1-1.5V3h4v.1a1.7 1.7 0 0 0 1 1.5 1.7 1.7 0 0 0 1.9-.3l.1-.1L19.8 7l-.1.1a1.7 1.7 0 0 0-.3 1.9 1.7 1.7 0 0 0 1.5 1h.1v4h-.1a1.7 1.7 0 0 0-1.5 1z"></path>
    @elseif($iconName === 'profile')
        <circle cx="12" cy="8" r="4"></circle><path d="M4 21a8 8 0 0 1 16 0"></path>
    @elseif($iconName === 'back')
        <path d="m15 18-6-6 6-6"></path>
    @elseif($iconName === 'external')
        <path d="M14 4h6v6"></path><path d="m20 4-9 9"></path><path d="M18 13v6H5V6h6"></path>
    @elseif($iconName === 'upload')
        <path d="M12 16V4"></path><path d="m7 9 5-5 5 5"></path><path d="M4 20h16"></path>
    @elseif($iconName === 'trash')
        <path d="M4 7h16"></path><path d="M9 7V4h6v3"></path><path d="m7 7 1 14h8l1-14"></path><path d="M10 11v6M14 11v6"></path>
    @elseif($iconName === 'eye')
        <path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6S2.5 12 2.5 12z"></path><circle cx="12" cy="12" r="2.5"></circle>
    @elseif($iconName === 'edit')
        <path d="M4 20h4l11-11-4-4L4 16z"></path><path d="m13.5 6.5 4 4"></path>
    @else
        <circle cx="12" cy="12" r="8"></circle>
    @endif
</svg>
