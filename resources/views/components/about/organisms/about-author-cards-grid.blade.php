 <section class="pb-20">
     <div class="max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">
         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
             @foreach ($authors as $author)
                 <x-about.molecules.about-author-card :name="$author->name" :role="$author->authorProfile->job_title ?? 'job title not filled in yet'" :bio="$author->authorProfile->bio ?? 'bio not filled in yet'"
                     :image="$author->avatar_url" :articles="$author->blogs()->count()" :joined="$author->created_at?->format('Y') ?? '-'" :quote="$author->authorProfile->quote ?? 'quote not filled in yet'" />
             @endforeach
         </div>
     </div>
 </section>
