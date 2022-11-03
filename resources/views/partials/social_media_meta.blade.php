        
        <meta property="og:url"                content="{{url()->current()}}" />
        <meta property="og:title"              content="{{ $mainContent["og_title"] }}" />
        <meta property="og:description"        content="{{ $mainContent["og_description"] }}" />
        <meta property="og:image"              content="{{ asset('storage/'.$mainContent["og_image"]) }}" />
        <meta property="og:type"               content="website" />

        <meta property="twitter:site"          content="{{url()->current()}}" />
        <meta property="twitter:title"         content="{{ $mainContent["og_title"] }}" />
        <meta property="twitter:description"   content="{{ $mainContent["og_description"] }}" />
        <meta property="twitter:image"         content="{{ asset('storage/'.$mainContent["og_image"]) }}" />
        <meta property="twitter:card"          content="summary" />

