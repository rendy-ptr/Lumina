 <div class="lg:w-2/3">
     <article class="card mb-8">
         <!-- Featured Image -->
         <div class="relative overflow-hidden rounded-t-2xl mb-8">
             <img src="{{ $blog->thumbnail_url }}" alt="{{ $blog->title }}" class="w-full h-80 object-cover">

             <!-- Category Badge -->
             <x-blog-detail.molecules.category-badge :blog="$blog" />
         </div>

         <!-- Article Meta -->
         <x-blog-detail.molecules.content :blog="$blog" />
     </article>
 </div>
