import React, { useState } from "react";

function InputError({ message }: { message: string }) {
    return message ? (
        <p className={"text-sm  text-red-600 "}>{message}</p>
    ) : null;
}
interface Option {
    label: string;
    value: boolean | string;
    icon: React.ComponentType | null;
}
interface MyInputProps {
    label?: string;
    options: Option[];
    value: boolean | string;
    setValue: (v: boolean | string) => void;
    error?: string;
    disabled?: boolean;
    className?: string;
}

const InputRadioBox: React.FC<MyInputProps> = ({
    label,
    value,
    setValue,
    className = "",
    error,
    options,
    disabled = false,
    ...props
}) => {
    return (
        <div className={`flex gap-2 items-center    `}>
            <div
                className={`flex gap-3 justify-between w-full  items-center ${
                    disabled ? " text-gray-500 bg-gray-900" : "text-black "
                } ${className}  `}
            >
                {label && (
                    <label className="w-40 text-sm font-semibold text-gray-800 tex">
                        {label}
                    </label>
                )}
                <div
                    className={` flex gap-2 w-full ${
                        typeof value != "boolean" && "max-lg:flex-wrap"
                    }  `}
                >
                    {options.map((option) => (
                        <button
                            type="button"
                            key={option.label}
                            className={` ${
                                typeof option.value == "boolean"
                                    ? "w-full px-4"
                                    : "px-4 w-full"
                            } ${
                                value === option.value
                                    ? "bg-red-500 text-white font-bold"
                                    : "bg-transparent border-gray-300 border-[1px]"
                            }     rounded-[5px] py-1 w-full`}
                            onClick={() => !disabled && setValue(option.value)}
                            disabled={disabled}
                        >
                            <div className="flex flex-col items-center justify-center text-center truncate">
                                {option.icon && <option.icon />}
                                <span>{option.label}</span>
                            </div>
                        </button>
                    ))}
                </div>
            </div>
            <InputError message={error as string} />
        </div>
    );
};
export default InputRadioBox;
