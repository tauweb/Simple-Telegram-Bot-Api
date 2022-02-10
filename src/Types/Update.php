<?php

namespace Tauweb\SimpleTelegramBotApi\Types;

/**
 * @method int getUpdateId()
 * @method Message getMessage()
 * @method Message getEditedMessage()
 * @method Message getChannelPost()
 * @method Message getEditedChannelPost()
 * @method InlineQuery getInlineQuery()
 * @method ChosenInlineResult getChosenInlineResult()
 * @method CallbackQuery getCallbackQuery()
 * @method ShippingQuery getShippingQuery()
 * @method PreCheckoutQuery getPreCheckoutQuery()
 * @method Poll getPoll()
 * @method PollAnswer getPollAnswer()
 * @method ChatMemberUpdated getMyChatMember()
 * @method ChatMemberUpdated getChatMember()
 * @method ChatJoinRequest getChatJoinRequest()
 */
class Update extends Type
{
    /**
     * @var array|string[]
     */
    protected array $subTypes = [
        'message' => Message::class,
        'edited_message' => Message::class,
        'channel_post' => Message::class,
        'edited_channel_post' => Message::class,
        'inline_query' => InlineQuery::class,
        'chosen_inline_result' => ChosenInlineResult::class,
        'callback_query' => CallbackQuery::class,
        'shipping_query' => ShippingQuery::class,
        'pre_checkout_query' => PreCheckoutQuery::class,
        'poll' => Poll::class,
        'poll_answer' => PollAnswer::class,
        'my_chat_member' => ChatMemberUpdated::class,
        'chat_member' => ChatMemberUpdated::class,
        'chat_join_request' => ChatJoinRequest::class,
    ];
}
