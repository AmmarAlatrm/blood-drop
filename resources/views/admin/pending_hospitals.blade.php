<div class="container mt-4">
    <h2>طلبات تسجيل المستشفيات المعلقة</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>اسم المشفى</th>
                <th>اسم المستخدم</th>
                <th>المدينة</th>
                <th>العنوان</th>
                <th>رقم الهاتف</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pendingHospitals as $hospital)
                <tr>
                    <td>{{ $hospital->name }}</td>
                    <td>{{ $hospital->username }}</td>
                    <td>{{ $hospital->city }}</td>
                    <td>{{ $hospital->address }}</td>
                    <td>{{ $hospital->mobile }}</td>
                    <td>
                        <form action="{{ route('admin.hospitals.approve', $hospital->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">موافقة</button>
                        </form>

                        <form action="{{ route('admin.hospitals.reject', $hospital->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت تأكد من رفض الطلب؟')">رفض</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">لا توجد طلبات معلقة حالياً.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
