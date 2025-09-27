 <div class="lg:w-2/3">
     <article class="card mb-8">
         <!-- Featured Image -->
         <div class="relative overflow-hidden rounded-t-2xl mb-8">
             <img src="{{ $post->thumbnail_url }}" alt="{{ $post->title }}" class="w-full h-80 object-cover">

             <!-- Category Badge -->
             <x-blog-detail.molecules.category-badge :post="$post" />
         </div>

         <!-- Article Meta -->
         <x-blog-detail.molecules.content :post="$post" />
     </article>
 </div>
