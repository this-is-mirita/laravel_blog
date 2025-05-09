<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data){
        try {
            DB::beginTransaction();
            // gpt сказал что через пулл лучше делать нахуй ансет  ✅✅✅
            // также передаем масив и вырезаем
            $tagIds = Arr::pull($data, 'tag_ids');
//            $tagIds = $data['tag_ids'];
//            unset($data['tag_ids']);

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            $post = Post::firstOrCreate($data);
            if(isset($tagIds)){
                $post->tags()->attach($tagIds);
            }

            Db::commit();
        } catch (\Exception $exception){
            DB::rollBack();
            abort(500, $exception->getMessage());
        }
    }

    public function update($data, $post){
        try {
            DB::beginTransaction();
            // gpt сказал что через пулл лучше делать нахуй ансет  ✅✅✅
            // также передаем масив и вырезаем
            $tagIds = Arr::pull($data, 'tag_ids');

//            $tagIds = $data['tag_ids'];
//            unset($data['tag_ids']);

            if(isset($data['preview_image'])){
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if(isset($data['main_image'])){
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            $post->update($data);
            if(isset($tagIds)){
                $post->tags()->sync($tagIds);
            }

            DB::commit(); // ✅
        } catch (\Exception $exception){
            DB::rollBack();
            abort(500, $exception->getMessage());
        }
        return $post;

    }
}
