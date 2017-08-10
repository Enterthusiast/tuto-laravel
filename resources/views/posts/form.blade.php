{{ Form::model($post, $options) }}

<div class="form-group">
{{ Form::label('title', 'Titre') }}
{{ Form::text('title', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
{{ Form::label('slug', 'Lien') }}
{{ Form::text('slug', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
{{ Form::label('category_id', 'Catégorie') }}
{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
{{ Form::label('tags_id[]', 'Tags') }}
{{ Form::select('tags_id[]', $tags, null, ['class' => 'form-control', 'multiple' => true]) }}
</div>
<div class="form-group">
{{ Form::label('content', 'Contenu') }}
{{ Form::textarea('content', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
<label>
{{ Form::checkbox('online', 1, null) }}
En ligne ?
</label>
</div>
<button class="btn btn-primary">Envoyer</button>

{{ Form::close() }}

{{--  <h1>Editer</h1>
{{ Form::open(['method' => 'put', 'url' => route('post.update', $post)]) }}

<div class="form-group">
{{ Form::label('title', 'Titre') }}
{{ Form::text('title', $post->title, ['class' => 'form-control']) }}
</div>
<div class="form-group">
{{ Form::label('slug', 'Lien') }}
{{ Form::text('slug', $post->slug, ['class' => 'form-control']) }}
</div>
<div class="form-group">
{{ Form::label('category_id', 'Catégorie') }}
{{ Form::select('category_id', $categories, $post->category_id, ['class' => 'form-control']) }}
</div>
<div class="form-group">
{{ Form::label('content', 'Contenu') }}
{{ Form::textarea('content', $post->content, ['class' => 'form-control']) }}
</div>
<div class="form-group">
<label>
{{ Form::checkbox('online', 1, $post->online) }}
En ligne ?
</label>
</div>
<button class="btn btn-primary">Envoyer</button>

{{ Form::close() }}  --}}