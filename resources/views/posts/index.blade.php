<x-default-layout>
    <div class="space-y-10 md:space-y-16">

        {{-- Boucle à travers chaque article --}}
        @forelse ($posts as $post )

            {{-- Inclusion du composant de poste avec l'attribut 'list' --}}
            <x-post :$post list />

            @empty

            <p class="text-slate-400 text-center">Aucun résultat</p>

        @endforelse

        {{-- Affichage de la pagination pour les articles --}}
        {{ $posts->links() }}

    </div>
</x-default-layout>
