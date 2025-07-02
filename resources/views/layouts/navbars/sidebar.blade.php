<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/welcome" style="font-size: 28px; font-weight: 525; text-align: center;" class="simple-text logo-normal">{{ __('Polman Preneur') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active" @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="tim-icons icon-badge" ></i>
                    <p class="nav-link-text" style="margin-top: 2.5px;">{{ __('User Setting') }}</p>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p style="margin-top: 3px;">{{ __('User Profile') }}</p>
                            </a>
                        </li>
                        @if (Auth::user() && Auth::user()->setLevel == '1')
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('admin.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p style="margin-top: 3px;">{{ __('User Management') }}</p>
                            </a>
                        </li>
                        @endif
                        @if (Auth::user() && Auth::user()->setSeller == '1')
                        <li @if ($pageSlug == 'your product') class="active " @endif>
                            <a href="{{url('/yourProduct',Auth::user()->user_id)}}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p style="margin-top: 3px;">{{ __('Your Product') }}</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>
            @if (Auth::user() && Auth::user()->setLevel == '1')
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="tim-icons icon-book-bookmark" ></i>
                    <p class="nav-link-text" style="margin-top: 2.5px;">{{ __('Approval') }}</p>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'user approval') class="active " @endif>
                            <a href="{{ route('userApproval')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p style="margin-top: 3px;">{{ __('User Approval') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'product approval') class="active " @endif>
                            <a href="{{ route('productApproval')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p style="margin-top: 3px;">{{ __('Product Approval') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'letter approval') class="active " @endif>
                            <a href="{{ route('letterApproval')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p style="margin-top: 3px;">{{ __('Letter Approval') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug == 'all product') class="active " @endif>
                <a href="{{ route('allProduct') }}">
                    <i class="tim-icons icon-bag-16"></i>
                    <p>{{ __('Product') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'category') class="active " @endif>
                <a href="/category">
                    <i class="tim-icons icon-bag-16"></i>
                    <p>{{ __('category') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'testimonials') class="active " @endif>
                <a href="{{ route('pages.testimonials') }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ __('Testimonial') }}</p>
                </a>
            </li>
            @endif
            @if (Auth::user() && Auth::user()->setSeller == '0' && Auth::user()->setLevel == '0')
            <li @if ($pageSlug == 'Seller') class="active " @endif>
                <a href="{{ route('formPage') }}">
                    <i class="tim-icons icon-bag-16"></i>
                    <p>{{ __('Wanna Be Seller?') }}</p>
                </a>
            </li>
            @endif
            @Auth
            <li @if ($pageSlug == 'Chat') class="active " @endif>
                <a href="{{ route('chat') }}">
                    <i class="tim-icons icon-chat-33"></i>
                    <p>{{ __('Chat') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'Contact') class="active " @endif>
                <a href="/contact">
                    <i class="tim-icons icon-chat-33"></i>
                    <p>{{ __('Contact') }}</p>
                </a>
            </li>
            @endauth
        </ul>
    </div>
</div>
