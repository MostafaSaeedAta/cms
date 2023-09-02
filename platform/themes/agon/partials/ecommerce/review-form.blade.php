<div class="col-review-form mt-3">
    <div id="review-form-wrapper">
        <div id="review-form">
            <div class="comment-respond">
                <h5 class="comment-reply-title title-question mt-30 mb-15">{{ __('Add your review') }}</h5>
                <div class="comment-notes mb-10">
                    <span>{{ __('Your email address will not be published.') }}</span> {{ __('Required fields are marked') }}
                    <span class="required"></span>
                </div>
                @guest('customer')
                    <p class="text-danger">{!! BaseHelper::clean(__('Please <a href=":link">login</a> to write review!', ['link' => route('customer.login')])) !!}</p>
                @endguest

                {!! Form::open([
                    'route'  => 'public.reviews.create',
                    'method' => 'POST',
                    'class'  => 'form-review-product',
                    'files'  => true,
                ]) !!}
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="row">
                        <div class="col-12 mb-3 d-flex mt-2">
                            <label class="required" for="rating">{{ __('Your rating') }}:</label>
                            <div class="form-rating-stars ms-2">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input class="btn-check" type="radio" id="rating-star-{{ $i }}" name="star" value="{{ $i }}">
                                    <label for="rating-star-{{ $i }}" title="{{ $i }} stars">
                                        <i class="fi fi-rr-star"></i>
                                    </label>
                                @endfor
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="required" for="comment">{{ __('Review') }}:</label>
                            <textarea class="form-control" name="comment" id="txt-comment" required aria-required="true"
                                rows="8" placeholder="{{ __('Write your review') }}" @guest('customer') disabled @endif></textarea>
                        </div>
                        <div class="col-12 mb-3 form-group">
                            <script type="text/x-custom-template" id="review-image-template">
                                <span class="image-viewer__item" data-id="__id__">
                                    <img src="{{ RvMedia::getDefaultImage() }}" alt="Preview" class="img-responsive d-block">
                                    <span class="image-viewer__icon-remove">
                                        <i class="fi fi-rr-cross-circle"></i>
                                    </span>
                                </span>
                            </script>
                            <div class="image-upload__viewer d-flex">
                                <div class="image-viewer__list position-relative">
                                    <div class="image-upload__uploader-container">
                                        <div class="d-table">
                                            <div class="image-upload__uploader">
                                                <i class="fi fi-rr-file-add"></i>
                                                <div class="image-upload__text">{{ __('Upload photos') }}</div>
                                                <input type="file"
                                                    name="images[]"
                                                    data-max-files="{{ EcommerceHelper::reviewMaxFileNumber() }}"
                                                    class="image-upload__file-input"
                                                    accept="image/png,image/jpeg,image/jpg"
                                                    multiple="multiple"
                                                    data-max-size="{{ EcommerceHelper::reviewMaxFileSize(true) }}"
                                                    data-max-size-message="{{ trans('validation.max.file', ['attribute' => '__attribute__', 'max' => '__max__']) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="loading">
                                        <div class="half-circle-spinner">
                                            <div class="circle circle-1"></div>
                                            <div class="circle circle-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="help-block">
                                {{ __('You can upload up to :total photos, each photo maximum size is :max kilobytes', [
                                        'total' => EcommerceHelper::reviewMaxFileNumber(),
                                        'max'   => EcommerceHelper::reviewMaxFileSize(true),
                                    ]) }}
                            </div>

                        </div>
                        <div class="col-12 form-submit">
                            <button class="btn btn-primary" type="submit" @guest('customer') disabled @endif>
                                <i class="fi fi-rr-paper-plane"></i>
                                <span>{{ __('Submit Review') }}</span>
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
