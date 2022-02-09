@extends('Mero::default')
@php
    $is_detail = 1
@endphp
@section('body_grid')
    <div class="single-post-wrap">

        <article id="post-105"
                 class="post-105 post type-post status-publish format-standard has-post-thumbnail hentry category-food">
            <div class="blog-post-item">
                <div class="entry-meta">
                  <span class="byline"> by: <span class="author vcard">
                          <a class="url fn n">{{ $article['author']['name'] }}</a></span></span><span
                            class="posted-on">Posted on: <a
                                rel="bookmark"><time class="entry-date published updated"
                                                     datetime="{{ $article['updated_at'] }}">{{ $article['updated_at'] }}</time></a></span>
                </div><!-- .entry-meta -->

                <header class="entry-header">
                    <h1 class="entry-title">{{ $article['title'] }}</h1></header><!-- .entry-header -->

                <div class="entry-content">
                    <div class="documentation is-dark">
                        {!! $article['content'] !!}
                    </div>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                  <span class="cat-links"><a href="/cat/{{ $article['category']['id'] }}.html"
                                             rel="category tag">{{ $article['category']['title'] }}</a></span><span
                            class="comments-link">
                        <a>Leave a Comment</a></span></footer>
                <!-- .entry-footer -->
            </div><!-- .blog-post-item -->
        </article><!-- #post-105 -->

        <nav class="navigation post-navigation" role="navigation" aria-label="Posts">
            <h2 class="screen-reader-text">Post navigation</h2>
            <div class="nav-links">
                @if(!empty($pre))
                    <div class="nav-previous"><a
                                href="/art/{{ $pre['id'] }}.html"
                                rel="prev"><span class="screen-reader-text">Previous Post</span><span aria-hidden="true"
                                                                                                      class="nav-subtitle">Previous</span>
                            <span class="nav-title"><span class="nav-title-icon-wrapper"><svg
                                            class="icon icon-arrow-left"
                                            aria-hidden="true" role="img"> <use
                                                href="#icon-arrow-left"
                                                xlink:href="#icon-arrow-left"></use> </svg></span>{{ $pre['title'] }}</span></a>
                    </div>
                @endif
                @if(!empty($next))
                    <div class="nav-next"><a
                                href="/art/{{ $next['id'] }}.html"
                                rel="next"><span class="screen-reader-text">Next Post</span><span aria-hidden="true"
                                                                                                  class="nav-subtitle">Next</span>
                            <span class="nav-title">{{ $next['title'] }}<span class="nav-title-icon-wrapper"><svg
                                            class="icon icon-arrow-right" aria-hidden="true" role="img"> <use
                                                href="#icon-arrow-right"
                                                xlink:href="#icon-arrow-right"></use> </svg></span></span></a>
                    </div>
                @endif
            </div>
        </nav>
        @if(!empty(config('deep_blog.show_comment')))
            <div id="comments" class="comments-area">
                <div id="respond" class="comment-respond">
                    <h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow"
                                                                                             id="cancel-comment-reply-link"
                                                                                             href="https://kantipurthemes.com/demo/mero-blog-pro/2020/07/26/australian-special-dishes/#respond"
                                                                                             style="display:none;">Cancel
                                reply</a></small></h3>
                    <form action="https://kantipurthemes.com/demo/mero-blog-pro/wp-comments-post.php" method="post"
                          id="commentform" class="comment-form" novalidate=""><p class="comment-notes"><span
                                    id="email-notes">Your email address will not be published.</span> Required fields
                            are marked <span
                                    class="required">*</span></p>
                        <p class="comment-form-comment"><label for="comment">Comment</label> <textarea id="comment"
                                                                                                       name="comment"
                                                                                                       cols="45"
                                                                                                       rows="8"
                                                                                                       maxlength="65525"
                                                                                                       required="required"></textarea>
                        </p>
                        <p class="comment-form-author"><label for="author">Name <span class="required">*</span></label>
                            <input
                                    id="author" name="author" type="text" value="" size="30" maxlength="245"
                                    required="required"></p>
                        <p class="comment-form-email"><label for="email">Email <span class="required">*</span></label>
                            <input
                                    id="email" name="email" type="email" value="" size="30" maxlength="100"
                                    aria-describedby="email-notes" required="required"></p>
                        <p class="comment-form-url"><label for="url">Website</label> <input id="url" name="url"
                                                                                            type="url"
                                                                                            value="" size="30"
                                                                                            maxlength="200"></p>
                        <p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent"
                                                                       name="wp-comment-cookies-consent" type="checkbox"
                                                                       value="yes"> <label
                                    for="wp-comment-cookies-consent">Save
                                my name, email, and website in this browser for the next time I comment.</label></p>
                        <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit"
                                                      value="Post Comment"> <input type="hidden" name="comment_post_ID"
                                                                                   value="105" id="comment_post_ID">
                            <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                        </p></form>
                </div><!-- #respond -->

            </div><!-- #comments -->
        @endif
    </div><!-- .single-post-wrap -->
@endsection