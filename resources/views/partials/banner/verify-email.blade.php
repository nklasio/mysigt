<form method="POST" action="#">
    @csrf
    <div class="py-4 text-center bg-indigo-800 lg:px-4">
        <button type="submit">
            <div class="flex items-center p-2 leading-none text-indigo-100 bg-indigo-600 lg:rounded-full lg:inline-flex"
                role="alert">
                <span class="flex px-2 py-1 mr-3 text-xs font-bold uppercase bg-indigo-500 rounded-full">ATTENTION!</span>
                <span class="flex-auto mr-2 font-semibold text-left">You are not yet verified. Resend Verification
                    Email</span>
                <svg class="w-4 h-4 opacity-75 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z" />
                </svg>
            </div>
        </button>
    </div>
</form>
