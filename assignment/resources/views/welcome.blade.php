<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Main') }}
        </h2>
    </x-slot>
    <div class="jumbotron"  style="margin-top: 30px;">
      <h1 class="display-4">LMS</h1>
      <h3 class="lead">A learning management system.</h3>
      <p> Here you can find all your learning needs in one place.</p>
    </div>
      <div style="width: 100%; display: table;">
        <div style="display: table-row">
            <div class="card bg-info mb-3" style="max-width: 20rem;display: table-cell;">
                <div class="card-header">Student</div>
                <div class="card-body">
                  <h4 class="card-title">Student(Noun)</h4>
                  <p class="card-text">
                    A person who is studying at a school or other place of education.</p>
                </div>
              </div>
              <div class="card bg-warning mb-3" style="max-width: 20rem;display: table-cell;">
                <div class="card-header">Teacher</div>
                <div class="card-body">
                  <h4 class="card-title">Teacher(Noun) </h4>
                  <p class="card-text">
                    A person who teaches, especially in a school.</p>
                </div>
              </div>
        </div>
    </div>
</x-app-layout>

