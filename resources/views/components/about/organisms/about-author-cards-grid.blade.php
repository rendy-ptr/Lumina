 <section class="pb-20">
     <div class="max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">
         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
             <!-- Card Author 1 -->
             @foreach ($authors as $author)
                 <x-about.molecules.about-author-card :name="$author->name" :role="$author->job_title" :bio="$author->authorProfile->bio" :image="$author->avatar_url"
                     :articles="$author->blogs()->count()" :joined="$author->created_at->format('Y')" :quote="$author->authorProfile->quote" />
             @endforeach
         </div>
     </div>
 </section>
