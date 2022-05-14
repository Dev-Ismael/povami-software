<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> logout </a>
<form id="logout-form" action="{{ route('affiliate.logout') }}" method="POST" class="d-none">
    @csrf
</form>
