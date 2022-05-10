<?php

namespace App\Jobs;

use App\Http\Services\CommentService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateCommentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $data;
    protected int $post_id;

    public function __construct(array $data, int $post_id)
    {
        $this->data = $data;
        $this->post_id = $post_id;
    }

    public function handle(CommentService $service)
    {
        $service->add($this->data, $this->post_id);
    }
}
