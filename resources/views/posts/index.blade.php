<x-layout>
    <div class="space-y-10 md:space-y-16">

        {{-- Boucle à travers chaque article --}}
        @foreach ($posts as $post )

            {{-- Inclusion du composant de poste avec l'attribut 'list' --}}
            <x-post :$post list />

        @endforeach

        {{-- Affichage de la pagination pour les articles --}}
        {{ $posts->links() }}

    </div>
</x-layout>
