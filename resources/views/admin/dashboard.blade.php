<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة تحكم الأدمن - طلبات المشافي</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <span class="navbar-brand">لوحة تحكم الإدارة</span>
        <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm">تسجيل خروج</button>
        </form>
    </div>
</nav>

<div class="container">
    <!-- تنبيهات النجاح -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">طلبات تسجيل المشافي المعلقة</h5>
        </div>
        <div class="card-body">
            @if($pendingHospitals->isEmpty())
                <div class="alert alert-info text-center mb-0">
                    لا توجد طلبات معلقة حالياً.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>اسم المستخدم</th>
                                <th>تاريخ الطلب</th>
                                <th class="text-center">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendingHospitals as $hospital)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $hospital->username }}</td>
                                    <td>{{ $hospital->created_at ? $hospital->created_at->format('Y-m-d H:i') : '-' }}</td>
                                    <td class="text-center">
                                        <!-- زر القبول -->
                                        <form action="{{ route('admin.hospitals.approve', $hospital->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('هل أنت تأكد من قبول هذا المشفى؟')">
                                                قبول وتفعيل
                                            </button>
                                        </form>

                                        <!-- زر الرفض -->
                                        <form action="{{ route('admin.hospitals.reject', $hospital->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من رفض هذا الطلب؟')">
                                                رفض وحذف
                                            </button>
                                        </form>
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

</body>
</html>
