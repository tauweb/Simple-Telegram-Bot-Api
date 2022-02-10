<?php

namespace Tauweb\SimpleTelegramBotApi\Types;


/**
 * @method int getMessageId()
 * @method User getFrom()
 * @method Chat getSenderChat()
 * @method int getDate()
 * @method Chat getChat()
 * @method User getForwardFrom()
 * @method Chat getForwardFromChat()
 * @method int getForwardFromMessageId()
 * @method string getForwardSignature()
 * @method string getForwardSenderName()
 * @method int getForwardDate()
 * @method bool getIsAutomaticForward()
 * @method Message getReplyToMessage()
 * @method User getViaBot()
 * @method int getEditDate()
 * @method bool getHasProtectedContent()
 * @method string getMediaGroupId()
 * @method string getAuthorSignature()
 * @method string getText()
 * @method MessageEntity[] getEntities()
 * @method Animation getAnimation()
 * @method Audio getAudio()
 * @method Document getDocument()
 * @method PhotoSize[] getPhoto()
 * @method Sticker getSticker()
 * @method Video getVideo()
 * @method VideoNote getVideoNote()
 * @method Voice getVoice()
 * @method string getCaption()
 * @method MessageEntity[] getCaptionEntities()
 * @method Contact getContact()
 * @method Dice getDice()
 * @method Game getGame()
 * @method Poll getPoll()
 * @method Venue getVenue()
 * @method Location getLocation()
 * @method User[] getNewChatMembers()
 * @method User getleftChatMember()
 * @method string getNewChatTitle()
 * @method PhotoSize[] getnew_chat_photo()
 * @method bool getdDeleteChatPhoto()
 * @method bool getGroupChatCreated()
 * @method bool getSupergroupChatCreated()
 * @method bool getChannelChatCreated()
 * @method MessageAutoDeleteTimerChanged getMessageAutoDeleteTimerChanged()
 * @method int getMigrateToChatId()
 * @method int getMigrateFromChatId()
 * @method Message getPinnedMessage()
 * @method Invoice getInvoice()
 * @method SuccessfulPayment getSuccessfulPayment()
 * @method string getConnectedWebsite()
 * @method PassportData getPassportData()
 * @method ProximityAlertTriggered getProximityAlertTriggered()
 * @method VoiceChatScheduled getVoiceChatScheduled()
 * @method VoiceChatStarted getVoiceChatStarted()
 * @method VoiceChatEnded getVoiceChatEnded()
 * @method VoiceChatParticipantsInvited getVoiceChatParticipantsInvited()
 * @method InlineKeyboardMarkup getReplyMarkup()
 */
class Message extends Type
{
    protected array $subTypes = [
        'from' => User::class,
        'sender_chat' => Chat::class,
        'chat' => Chat::class,
        'forward_from' => User::class,
        'forward_from_chat' => Chat::class,
        'reply_to_message' => Message::class,
        'via_bot' => User::class,
        'entities' => [MessageEntity::class],
        'animation' => Animation::class,
        'audio' => Audio::class,
        'document' => Document::class,
        'photo' => [PhotoSize::class],
        'sticker' => Sticker::class,
        'video' => Video::class,
        'video_note' => VideoNote::class,
        'voice' => Voice::class,
        'caption_entities' => [MessageEntity::class],
        'contact' => Contact::class,
        'dice' => Dice::class,
        'game' => Game::class,
        'poll' => Poll::class,
        'venue' => Venue::class,
        'location' => Location::class,
        'new_chat_members' => [User::class],
        'left_chat_member' => User::class,
        'new_chat_photo' => [PhotoSize::class],
        'message_auto_delete_timer_changed' => MessageAutoDeleteTimerChanged::class,
        'pinned_message' => Message::class,
        'invoice' => Invoice::class,
        'successful_payment' => SuccessfulPayment::class,
        'passport_data' => PassportData::class,
        'proximity_alert_triggered' => ProximityAlertTriggered::class,
        'voice_chat_scheduled' => VoiceChatScheduled::class,
        'voice_chat_started' => VoiceChatStarted::class,
        'voice_chat_ended' => VoiceChatEnded::class,
        'voice_chat_participants_invited' => VoiceChatParticipantsInvited::class,
        'reply_markup' => InlineKeyboardMarkup::class,
    ];
}
