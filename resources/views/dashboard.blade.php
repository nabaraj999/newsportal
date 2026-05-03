<x-app-layout>
    <section class="section">
        <div class="section-header d-flex flex-wrap justify-content-between align-items-center">
            <div>
                <h1 class="mb-1">
                    {{ $company?->name ? $company->name . ' Admin Dashboard' : 'Admin Dashboard' }}
                </h1>
                <p class="text-muted mb-0">
                    Welcome back, {{ auth()->user()->name }}. {{ now()->format('l, F d, Y') }}
                </p>
            </div>
            <div class="d-flex gap-2 mt-2 mt-md-0">
                <a href="{{ route('admin.article.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus mr-1"></i> New Article
                </a>
                <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-primary">
                    <i class="fas fa-globe mr-1"></i> View Website
                </a>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                @foreach ($statsCards as $card)
                    <div class="col-xl-3 col-md-6 col-sm-6">
                        <div class="card admin-stat-card border-0 shadow-sm {{ $card['class'] }}">
                            <div class="card-body">
                                <span class="admin-stat-label">{{ $card['label'] }}</span>
                                <h3 class="admin-stat-number">{{ $card['value'] }}</h3>
                                <span class="admin-stat-meta">{{ $card['meta'] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card admin-surface-card border-0 shadow-sm">
                        <div class="card-header border-0 pb-0">
                            <h4 class="mb-0">Recently Added Articles</h4>
                        </div>
                        <div class="card-body">
                            @if ($latestArticles->isEmpty())
                                <div class="alert alert-light border mb-0">
                                    No articles yet. Create your first story to get started.
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Created</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($latestArticles as $article)
                                                <tr>
                                                    <td class="font-weight-600">{{ $article->title }}</td>
                                                    <td>
                                                        @if ($article->status === 'approved')
                                                            <span class="badge badge-success">Approved</span>
                                                        @elseif($article->status === 'pending')
                                                            <span class="badge badge-warning">Pending</span>
                                                        @else
                                                            <span class="badge badge-danger">Rejected</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $article->created_at?->format('M d, Y h:i A') }}</td>
                                                    <td class="text-right">
                                                        <a href="{{ route('admin.article.edit', $article->id) }}"
                                                            class="btn btn-sm btn-outline-primary">Edit</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card admin-surface-card border-0 shadow-sm">
                        <div class="card-header border-0 pb-0">
                            <h4 class="mb-0">Quick Actions</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($quickActions as $action)
                                <a href="{{ $action['route'] }}" class="admin-quick-link {{ $loop->last ? 'mb-0' : '' }}">
                                    <span><i class="{{ $action['icon'] }} mr-2"></i> {{ $action['label'] }}</span>
                                    <strong>{{ $action['count'] }}</strong>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="card admin-surface-card border-0 shadow-sm">
                        <div class="card-header border-0 pb-0">
                            <h4 class="mb-0">Portal Summary</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                @foreach ($portalSummary as $item)
                                    <li class="d-flex justify-content-between py-2 {{ $loop->last ? '' : 'border-bottom' }}">
                                        <span>{{ $item['label'] }}</span>
                                        <strong class="{{ $item['class'] }}">{{ $item['value'] }}</strong>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card admin-surface-card border-0 shadow-sm">
                        <div class="card-header border-0 pb-0">
                            <h4 class="mb-0">Top Categories</h4>
                        </div>
                        <div class="card-body">
                            @if ($topCategories->isEmpty())
                                <p class="text-muted mb-0">No categories found.</p>
                            @else
                                @foreach ($topCategories as $category)
                                    <div class="d-flex justify-content-between align-items-center py-2 {{ $loop->last ? '' : 'border-bottom' }}">
                                        <span>{{ $category->title }}</span>
                                        <span class="badge badge-primary">{{ $category->articles_count }} Articles</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
